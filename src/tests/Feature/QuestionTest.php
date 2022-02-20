<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class QuestionTest extends TestCase
{
    use DatabaseMigrations;

    public function test_any_user_can_see_the_list_of_all_questions()
    {
        $user = \App\Models\User::factory()->create();
        $category = \App\Models\Category::factory()->create();

        $question = \App\Models\Question::factory()->create([
            'user_id' => $user->id,
            'category_id' => $category->id
        ]);

        $response = $this->get(route('questions.index'));

        $response->assertSee([
            $question->title,
            $user->name,
        ]);
    }

    public function test_any_user_can_view_a_single_question()
    {
        $user = \App\Models\User::factory()->create();
        $category = \App\Models\Category::factory()->create();

        $question = \App\Models\Question::factory()->create([
            'user_id' => $user->id,
            'category_id' => $category->id
        ]);

        $response = $this->get(route('questions.show', $question));

        $response->assertSee([
            $question->title,
            $question->body,
            $user->name,
        ]);
    }
}
