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
        DB::table('users')->insert([
            'username' => 'user_1',
            'name' => 'Martin',
            'surname' => 'Šachista',
            'email' => 'user_1@gmail.com',
            'password' => bcrypt('user_1'),
        ]);
        DB::table('users')->insert([
            'username' => 'user_2',
            'name' => 'Jan',
            'surname' => 'Novák',
            'email' => 'user_2@gmail.com',
            'password' => bcrypt('user_2'),
        ]);
        DB::table('users')->insert([
            'username' => 'user_3',
            'name' => 'Tomáš',
            'surname' => 'Brzobohatý',
            'email' => 'user_3@gmail.com',
            'password' => bcrypt('user_3'),
        ]);
        DB::table('users')->insert([
            'username' => 'user_4',
            'name' => 'Anička',
            'surname' => 'Malá',
            'email' => 'user_4@gmail.com',
            'password' => bcrypt('user_4'),
        ]);
        DB::table('users')->insert([
            'username' => 'admin',
            'name' => 'Admin',
            'surname' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
            'role' => 'admin',
        ]);
        DB::table('news')->insert([
            'title' => 'nova aktualita',
            'text' => 'nova aktualita text',
            'created_at' => '2023-01-09 00:00:00',
        ]);
        DB::table('news')->insert([
            'title' => 'aktualita 2',
            'text' => 'text nove aktuality 2',
            'created_at' => '2023-01-11 00:00:00',
        ]);
        DB::table('comments')->insert([
            'text' => 'comment k aktualite 2',
            'news_id' => '2',
            'username' => 'user_1',
            'created_at' => '2023-01-11 00:00:00',
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
        DB::table('attendance_days')->insert([
            'date' => '2023-03-02 00:00:00',
        ]);
        DB::table('attendance_days')->insert([
            'date' => '2023-03-09 00:00:00',
        ]);
        DB::table('attendance_days')->insert([
            'date' => '2023-03-16 00:00:00',
        ]);
        DB::table('attendance_days')->insert([
            'date' => '2023-03-23 00:00:00',
        ]);
        DB::table('attendence_days_users')->insert([
            'attendance_day_id' => '1',
            'username' => 'user_1'
        ]);
        DB::table('tournaments')->insert([
            'title' => 'Hra o zlatý pohár',
            'date' => '2023-02-16 00:00:00',
            'description'=> 'V tomto turnaji výherce získá opravdový zlatý pohár!'
        ]);
        DB::table('tournaments')->insert([
            'title' => 'Turnaj stříbrný bludišťák',
            'date' => '2023-06-09 00:00:00',
            'description'=> 'Víťez získá dobrý pocit sám ze sebe'
        ]);
        DB::table('tournaments_users')->insert([
            'tournament_id' => '1',
            'username' => 'user_1',
            'created_at' => '2023-02-15 02:15:30'
        ]);
        DB::table('tournaments_users')->insert([
            'tournament_id' => '1',
            'username' => 'user_2',
            'created_at' => '2023-02-11 02:15:30'
        ]);
        DB::table('tournaments_users')->insert([
            'tournament_id' => '1',
            'username' => 'user_3',
            'created_at' => '2023-02-10 02:15:30'
        ]);
        DB::table('tournaments_users')->insert([
            'tournament_id' => '1',
            'username' => 'user_4',
            'created_at' => '2023-02-01 02:15:30',
        ]);
        DB::table('games')->insert([
            'tournament_id' => '1',
            'black' => 'user_2',
            'white' => 'user_1',
            'winner' => 'user_2',
            'pgn' => '1. e4 e5 {king\'s pawn opening} 2. Nf3 Nc6 {aaa} 3. Bc4 Bc5 {giuoco piano} *'
        ]);
        DB::table('events')->insert([
            'name' => 'Muzeum šachu',
            'date' => '2023-12-03 00:00:00',
            'description' => 'Dne 3. 12. 2023 uspořádáme výlet do největšího muzea šachu v ČR. S sebou svačinu a pití.',
        ]);
        DB::table('events')->insert([
            'name' => 'Sachy pod sluncem',
            'date' => '2023-07-12 00:00:00',
            'description' => 'Budeme hrat sachy venku pri slunicku.',
        ]);

    }
}
