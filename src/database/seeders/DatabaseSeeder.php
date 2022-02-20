<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if (App::environment(['local', 'staging'])) {
            $users = \App\Models\User::factory(5)->create();

            $categories = \App\Models\Category::factory(5)->create();

            $users->each(function($user) use ($categories) {
                $categories->each(function($category) use ($user) {
                    $questions = \App\Models\Question::factory(15)->create([
                        'user_id' => $user->id,
                        'category_id' => $category->id
                    ]);

                    $questions->each(function($question) {
                        \App\Models\Answer::factory(2)->create([
                            'question_id' => $question->id,
                        ]);
                    });
                });
            });
        }
    }
}
