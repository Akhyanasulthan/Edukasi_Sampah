<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function __construct()
    {
        // Bagikan data materi ke semua tampilan (untuk Navbar dan Footer)
        $materials = \App\Models\Material::where('is_published', true)->get();
        \Illuminate\Support\Facades\View::share('globalMaterials', $materials);

        $hasTips = \App\Models\Tip::where('is_published', true)->exists();
        \Illuminate\Support\Facades\View::share('hasTips', $hasTips);
    }

    public function beranda()
    {
        $materials = \App\Models\Material::where('is_published', true)->take(4)->get();
        return view('public.beranda', compact('materials'));
    }

    public function tentang()
    {
        return view('public.tentang');
    }

    public function materiIndex()
    {
        $materials = \App\Models\Material::where('is_published', true)->get();
        return view('public.materi.index', compact('materials'));
    }

    public function materiShow($slug)
    {
        $materi = \App\Models\Material::where('slug', $slug)->where('is_published', true)->firstOrFail();
        return view('public.materi.show', compact('materi'));
    }

    public function galeri()
    {
        $galleries = \App\Models\Gallery::latest()->get();
        return view('public.galeri', compact('galleries'));
    }

    public function video()
    {
        $videos = \App\Models\Video::where('is_published', true)->latest()->get();
        return view('public.video', compact('videos'));
    }

    public function tips()
    {
        $tips = \App\Models\Tip::where('is_published', true)->latest()->get();
        return view('public.tips', compact('tips'));
    }

    public function tipsShow($slug)
    {
        $tip = \App\Models\Tip::where('slug', $slug)->where('is_published', true)->firstOrFail();
        return view('public.tips_show', compact('tip'));
    }

    public function evaluasi()
    {
        $isOpen = \Illuminate\Support\Facades\Cache::get('evaluation_form_enabled', true);
        $questions = \App\Models\EvaluationQuestion::where('is_active', true)->orderBy('order_column', 'asc')->get();
        return view('public.evaluasi', compact('isOpen', 'questions'));
    }

    public function evaluasiSubmit(Request $request)
    {
        $isOpen = \Illuminate\Support\Facades\Cache::get('evaluation_form_enabled', true);
        if (!$isOpen) {
            return back()->with('error', 'Mohon maaf, form evaluasi sedang ditutup.');
        }

        // We only require that 'answers' array is present if there are active questions.
        // We will validate individual answers below.
        $request->validate([
            'answers' => 'nullable|array'
        ]);

        $activeQuestions = \App\Models\EvaluationQuestion::where('is_active', true)->get();
        $validationRules = [];
        $validationMessages = [];

        foreach ($activeQuestions as $question) {
            $validationRules['answers.' . $question->id] = 'required';
            $validationMessages['answers.' . $question->id . '.required'] = 'Pertanyaan "' . $question->question . '" wajib diisi.';
        }

        $request->validate($validationRules, $validationMessages);

        // Create the submission wrapper
        $evaluation = \App\Models\Evaluation::create([]);

        // Save individual answers
        if ($request->has('answers')) {
            foreach ($request->answers as $question_id => $answer) {
                \App\Models\EvaluationAnswer::create([
                    'evaluation_id' => $evaluation->id,
                    'evaluation_question_id' => $question_id,
                    'answer' => $answer
                ]);
            }
        }

        return back()->with('success', 'Terima kasih atas partisipasi Anda dalam evaluasi ini.');
    }

    public function kontak()
    {
        return view('public.kontak');
    }

    public function kontakSubmit(Request $request)
    {
        $request->validate([
            'nama'    => 'required|string|max:100',
            'email'   => 'required|email|max:100',
            'subjek'  => 'required|string|max:200',
            'pesan'   => 'required|string|max:2000',
        ]);

        \App\Models\Contact::create([
            'name' => $request->nama,
            'email' => $request->email,
            'subject' => $request->subjek,
            'message' => $request->pesan,
        ]);

        return redirect()->route('kontak')
            ->with('success', 'Pesan Anda berhasil dikirim! Kami akan segera menghubungi Anda.');
    }
}
