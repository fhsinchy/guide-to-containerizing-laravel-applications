<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (User::select('email')->where('email', 'farhan@questionboard.test')->doesntExist()) {
            User::create([
                'name' => 'Farhan Hasin Chowdhury',
                'email' => 'farhan@questionboard.test',
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
            ]);
        }
    }
}
