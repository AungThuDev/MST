<?php

namespace Database\Seeders;

use App\Models\Faq;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Faq::factory(20)->create();

        User::create([
            'name' => 'userone',
            'email' => 'userone@gmail.com',
            'password' => Hash::make('password')
        ]);
    }
}
