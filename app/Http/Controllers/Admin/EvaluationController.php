<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Evaluation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class EvaluationController extends Controller
{
    /**
     * Display the settings form for evaluations.
     */
    public function form()
    {
        $isOpen = Cache::get('evaluation_form_enabled', true);
        return view('admin.evaluations.form', compact('isOpen'));
    }

    /**
     * Update the settings form for evaluations.
     */
    public function updateForm(Request $request)
    {
        $isOpen = $request->has('is_open');
        Cache::put('evaluation_form_enabled', $isOpen);

        return back()->with('success', 'Pengaturan form evaluasi berhasil disimpan.');
    }

    /**
     * Display a listing of the evaluation results.
     */
    public function index()
    {
        $evaluations = Evaluation::with('answers.question')->latest()->get();
        $questions = \App\Models\EvaluationQuestion::orderBy('order_column', 'asc')->get();
        return view('admin.evaluations.index', compact('evaluations', 'questions'));
    }

    /**
     * Export evaluations to CSV.
     */
    public function export()
    {
        $evaluations = Evaluation::with('answers.question')->orderBy('created_at', 'asc')->get();
        $questions = \App\Models\EvaluationQuestion::orderBy('order_column', 'asc')->get();
        
        $filename = "evaluasi_sampah_" . date('Ymd_His') . ".csv";

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$filename",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = ['ID', 'Tanggal'];
        foreach($questions as $q) {
            $columns[] = $q->question;
        }

        $callback = function() use($evaluations, $columns, $questions) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($evaluations as $eval) {
                $row = [
                    $eval->id,
                    $eval->created_at->format('Y-m-d H:i:s')
                ];
                
                $answers = $eval->answers->keyBy('evaluation_question_id');
                foreach($questions as $q) {
                    $row[] = isset($answers[$q->id]) ? $answers[$q->id]->answer : '';
                }

                fputcsv($file, $row);
            }
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
