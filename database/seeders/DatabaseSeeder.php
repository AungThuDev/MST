<?php

namespace Database\Seeders;

use App\Models\CampusContent;
use App\Models\Faq;
use App\Models\Info;
use App\Models\Phone;
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
        Faq::factory(10)->create();

        User::create([
            'name' => 'userone',
            'email' => 'userone@gmail.com',
            'password' => Hash::make('password')
        ]);
        CampusContent::create([
            'name' => 'MST Campus',
            'address' => 'No. 36, Alan Pya Pagoda Street, Yangon, Myanmar',
        ]);
        Phone::create([
            'campus_id' => 1,
            'number' => '+95 9 422288106',
        ]);
        Info::create([
            'name' => 'email',
            'link' => 'mst@gmail.com'
        ]);
        Info::create([
            'name' => 'facebook',
            'link' => 'https://www.facebook.com/mstcampus'
        ]);
        Info::create([
            'name' => 'youtube',
            'link' => 'https://www.youtube.com/mstcampus'
        ]);
        Info::create([
            'name' => 'linkedin',
            'link' => 'https://www.linkedin.com/school/mstcampus'
        ]);
    }
}
