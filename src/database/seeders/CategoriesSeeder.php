<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Category::all()->isEmpty()) {
            collect(['PHP', 'Laravel', 'AWS', 'Elastic Beanstalk'])->each(fn ($title) => Category::create(['title' => $title]));
        }
    }
}
