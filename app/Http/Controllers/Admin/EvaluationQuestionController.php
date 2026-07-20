<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EvaluationQuestion;
use Illuminate\Http\Request;

class EvaluationQuestionController extends Controller
{
    public function index()
    {
        $questions = EvaluationQuestion::orderBy('order_column', 'asc')->get();
        return view('admin.evaluation_questions.index', compact('questions'));
    }

    public function create()
    {
        return view('admin.evaluation_questions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'type' => 'required|in:text,number,radio,textarea',
            'options' => 'nullable|string', // Comma separated for radio
            'order_column' => 'required|integer'
        ]);

        $options = null;
        if ($request->type === 'radio' && $request->options) {
            $options = array_map('trim', explode(',', $request->options));
        }

        EvaluationQuestion::create([
            'question' => $request->question,
            'type' => $request->type,
            'options' => $options,
            'is_active' => $request->has('is_active'),
            'order_column' => $request->order_column,
        ]);

        return redirect()->route('admin.evaluation-questions.index')->with('success', 'Pertanyaan berhasil ditambahkan.');
    }

    public function edit(EvaluationQuestion $evaluationQuestion)
    {
        return view('admin.evaluation_questions.edit', compact('evaluationQuestion'));
    }

    public function update(Request $request, EvaluationQuestion $evaluationQuestion)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'type' => 'required|in:text,number,radio,textarea',
            'options' => 'nullable|string', // Comma separated for radio
            'order_column' => 'required|integer'
        ]);

        $options = null;
        if ($request->type === 'radio' && $request->options) {
            $options = array_map('trim', explode(',', $request->options));
        }

        $evaluationQuestion->update([
            'question' => $request->question,
            'type' => $request->type,
            'options' => $options,
            'is_active' => $request->has('is_active'),
            'order_column' => $request->order_column,
        ]);

        return redirect()->route('admin.evaluation-questions.index')->with('success', 'Pertanyaan berhasil diperbarui.');
    }

    public function destroy(EvaluationQuestion $evaluationQuestion)
    {
        $evaluationQuestion->delete();
        return redirect()->route('admin.evaluation-questions.index')->with('success', 'Pertanyaan berhasil dihapus.');
    }
}
