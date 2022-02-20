<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Question;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $questions = $category->questions()
        ->select('id', 'title', 'body', 'category_id', 'user_id', 'created_at')
        ->with(['user', 'category'])
        ->latest()
        ->get();

        return view('categories.show', compact('category', 'questions'));
    }
}
