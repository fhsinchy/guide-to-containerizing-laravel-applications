<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = [];

        if (cache()->has('questions')) {
            $questions = cache()->get('questions');
        } else {
            $questions = Question::select('id', 'title', 'body', 'category_id', 'user_id', 'created_at')
            ->with(['user', 'category'])
            ->latest()
            ->get();

            cache()->put('questions', $questions, now()->addHours(12));
        }

        return view('questions.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::select('id', 'title')->latest()->get();

        return view('questions.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Question::create([
            'title' => $request->title,
            'body' => $request->body,
            'category_id' => $request->category,
            'user_id' => auth()->id(),
        ]);

        cache()->forget('questions');

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        return view('questions.show', compact('question'));
    }
}
