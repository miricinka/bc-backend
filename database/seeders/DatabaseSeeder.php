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
            'title' => 'Mistrovství ČR mládeže v rapid šachu 2023',
            'text' => 'Ve dnech 4. – 6. září 2020 se v Českých Budějovicích konalo Mistrovství ČR mládeže v rapid šachu 2020. Z kuřimských dětí si za body získané v seriálu KP v uplynulém roce účast vybojovalo šest šachistů a šachistek. V silné konkurenci (mistrovství se účastnila většina nejlepších hráčů) se vzhledem k tréninkovému manku dá říct, že naše konečná umístění rozhodně nejsou zklamáním.',
            'created_at' => '2023-01-09 00:00:00',
        ]);
        DB::table('news')->insert([
            'title' => 'Hráči proti velmistrům',
            'text' => 'Šachy se hrají navzdory koronaviru – aktuálně běží souboj Hráči proti velmistrům na youtube kanálu Robert a Petr šachy. Po první simultánce Štěpána Žilky, kdy se ukázalo, že proti stovce hráčů to nestíhá ani portál Lichess, natož velmistr (Andrej vyhrál na čas), se nově hraje vždy proti dvacítce předem přihlášených hráčů.
            Prvních dvacet zástupců hráčské komunity se drželo skvěle a dokázalo velmistra Žilku porazit. Do pondělní partie nastoupí za velmistry Vojtěch Plát a na šachovnici č. 15 bude Andrej...tak mu držte palce...
            Velmistři se nechtějí jen tak dát – viz komentář na FB stránce RaP šachy: „Chtěli jste válku? Máte ji mít! Vypouštíme proti Vám " Krakena " a těšte se na pondělí! Vedete v simultánce 1-0 a co se na Vás chystá, to budou vlny:) Vojta bude v přenosu blafovat, mystifikovat a klamat, tak aby náš cíl a tím je vyrovnat zápas proti Vám byl splněn. Není jiná možnost, než vyrovnat tento souboj s Vámi! Legrace skončila ! To bohdá nebude, aby český lid porážel nám velmistry!!',
            'created_at' => '2023-01-11 00:00:00',
        ]);
        DB::table('comments')->insert([
            'text' => 'Paráda',
            'news_id' => '2',
            'username' => 'user_1',
            'created_at' => '2023-01-11 00:00:00',
        ]);
        DB::table('activities')->insert([
            'name' => 'DÚ 1',
            'weight' => '2',
            'description' => 'Domácí úkol zadaný 11. 3. 2022',
        ]);
        DB::table('activities')->insert([
            'name' => 'Soutěž',
            'weight' => '4',
            'description' => 'Soutěž',
        ]);
        DB::table('activities')->insert([
            'name' => 'DÚ 2',
            'weight' => '1',
            'description' => 'Soutěž',
        ]);
        DB::table('activities_users')->insert([
            'activity' => 'DÚ 1',
            'username' => 'user_2',
        ]);
        DB::table('activities_users')->insert([
            'activity' => 'Soutěž',
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
