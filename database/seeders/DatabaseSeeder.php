<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
        DB::table('users')->insert([
            'username' => 'user_1',
            'name' => 'Jmeno1',
            'surname' => 'Prijmeni1',
            'email' => 'user_1.@gmail.com',
            'password' => 'user_1',
        ]);
        DB::table('users')->insert([
            'username' => 'user_2',
            'name' => 'Jmeno2',
            'surname' => 'Prijmeni2',
            'email' => 'user_2.@gmail.com',
            'password' => 'user_2',
        ]);
        DB::table('news')->insert([
            'title' => 'nova aktualita',
            'text' => 'nova aktualita text',
        ]);
        DB::table('news')->insert([
            'title' => 'aktualita 2',
            'text' => 'text nove aktuality 2',
        ]);
        DB::table('comments')->insert([
            'text' => 'comment k aktualite 2',
            'news_id' => '2',
            'username' => 'user_1',
        ]);
        DB::table('activities')->insert([
            'name' => 'Kresleni',
            'weight' => '2',
            'description' => 'Ta nejlepsi aktivita',
        ]);
        DB::table('activities')->insert([
            'name' => 'Psani',
            'weight' => '4',
            'description' => 'Ta nejlepsi aktivita 2',
        ]);
        DB::table('activities_users')->insert([
            'activity' => 'Kresleni',
            'username' => 'user_2',
        ]);
        DB::table('activities_users')->insert([
            'activity' => 'Psani',
            'username' => 'user_1',
        ]);
    }
}
