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
            'email' => 'user_1.@gmail.com',
            'password' => 'user_1',
        ]);
        DB::table('users')->insert([
            'username' => 'user_2',
            'name' => 'Jan',
            'surname' => 'Novák',
            'email' => 'user_2.@gmail.com',
            'password' => 'user_2',
        ]);
        DB::table('users')->insert([
            'username' => 'user_3',
            'name' => 'Tomáš',
            'surname' => 'Brzobohatý',
            'email' => 'user_2.@gmail.com',
            'password' => 'user_2',
        ]);
        DB::table('users')->insert([
            'username' => 'user_4',
            'name' => 'Anička',
            'surname' => 'Malá',
            'email' => 'user_2.@gmail.com',
            'password' => 'user_2',
        ]);
        DB::table('news')->insert([
            'title' => 'nova aktualita',
            'text' => 'nova aktualita text',
            'created_at' => '2023-01-09 00:00:00',
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
            'description'=> 'Hra o zlatý pohár'
        ]);
        DB::table('tournaments')->insert([
            'title' => 'Turnaj stříbrný bludišťák',
            'date' => '2023-03-09 00:00:00',
            'description'=> 'Víťez získá dobrý pocit sám ze sebe'
        ]);
        DB::table('tournaments_users')->insert([
            'tournament_id' => '1',
            'username' => 'user_1'
        ]);
        DB::table('tournaments_users')->insert([
            'tournament_id' => '1',
            'username' => 'user_2'
        ]);
        DB::table('tournaments_users')->insert([
            'tournament_id' => '1',
            'username' => 'user_3'
        ]);
        DB::table('tournaments_users')->insert([
            'tournament_id' => '1',
            'username' => 'user_4'
        ]);
        DB::table('games')->insert([
            'tournament_id' => '1',
            'black' => 'user_2',
            'white' => 'user_1',
            'winner' => 'user_2',
            'pgn' => '1. e4 e5 {king\'s pawn opening} 2. Nf3 Nc6 {aaa} 3. Bc4 Bc5 {giuoco piano} *'
        ]);
        DB::table('events')->insert([
            'name' => 'Muzeum sachu',
            'date' => '2023-12-03 00:00:00',
            'description' => 'Vylet do nejvestiho muzea sachu v CR. S sebou svavinu a piti.',
        ]);
        DB::table('events')->insert([
            'name' => 'Sachy pod sluncem',
            'date' => '2023-07-12 00:00:00',
            'description' => 'Budeme hrat sachy venku pri slunicku.',
        ]);

    }
}
