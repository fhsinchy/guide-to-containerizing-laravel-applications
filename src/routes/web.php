<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('questions', App\Http\Controllers\QuestionController::class)->only([
    'index',
    'show',
])->names('questions');
Route::resource('answers', App\Http\Controllers\AnswerController::class)->only(['store'])->names('answers');
Route::resource('categories', App\Http\Controllers\CategoryController::class)->only(['show'])->names('categories');

Route::middleware(['auth'])->prefix('dashboard')->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('questions', App\Http\Controllers\QuestionController::class)->only([
        'create',
        'store',
    ])->names('questions');
});

require __DIR__.'/auth.php';
