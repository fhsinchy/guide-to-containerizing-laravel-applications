<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Answer::create([
            'name' => $request->name,
            'email' => $request->email,
            'body' => $request->body,
            'question_id' => $request->question,
        ]);

        return back();
    }
}
