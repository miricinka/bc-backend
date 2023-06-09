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
            'created_at' => '2023-04-09 00:00:00',
        ]);
        DB::table('news')->insert([
            'title' => 'Hráči proti velmistrům',
            'text' => 'Šachy se hrají navzdory koronaviru – aktuálně běží souboj Hráči proti velmistrům na youtube kanálu Robert a Petr šachy. Po první simultánce Štěpána Žilky, kdy se ukázalo, že proti stovce hráčů to nestíhá ani portál Lichess, natož velmistr (Andrej vyhrál na čas), se nově hraje vždy proti dvacítce předem přihlášených hráčů.
            Prvních dvacet zástupců hráčské komunity se drželo skvěle a dokázalo velmistra Žilku porazit. Do pondělní partie nastoupí za velmistry Vojtěch Plát a na šachovnici č. 15 bude Andrej...tak mu držte palce...
            Velmistři se nechtějí jen tak dát – viz komentář na FB stránce RaP šachy: „Chtěli jste válku? Máte ji mít! Vypouštíme proti Vám " Krakena " a těšte se na pondělí! Vedete v simultánce 1-0 a co se na Vás chystá, to budou vlny:) Vojta bude v přenosu blafovat, mystifikovat a klamat, tak aby náš cíl a tím je vyrovnat zápas proti Vám byl splněn. Není jiná možnost, než vyrovnat tento souboj s Vámi! Legrace skončila ! To bohdá nebude, aby český lid porážel nám velmistry!!',
            'created_at' => '2023-04-11 00:00:00',
        ]);
        DB::table('news')->insert([
            'title' => 'Lorem ipsum',
            'text' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean fermentum risus id tortor. Integer malesuada. Maecenas aliquet accumsan leo. Phasellus enim erat, vestibulum vel, aliquam a, posuere eu, velit. Aenean vel massa quis mauris vehicula lacinia. Duis viverra diam non justo. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Sed convallis magna eu sem. Duis ante orci, molestie vitae vehicula venenatis, tincidunt ac pede. Aliquam erat volutpat. Integer in sapien. Maecenas libero. Nullam justo enim, consectetuer nec, ullamcorper ac, vestibulum in, elit. Donec iaculis gravida nulla. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Etiam sapien elit, consequat eget, tristique non, venenatis quis, ante. Phasellus faucibus molestie nisl.',
            'created_at' => '2023-01-13 00:00:00',
        ]);
        DB::table('news')->insert([
            'title' => 'Nulla non arcu lacinia',
            'text' => 'Nulla non arcu lacinia neque faucibus fringilla. Vivamus porttitor turpis ac leo. Curabitur bibendum justo non orci. Integer lacinia. Aliquam id dolor. Praesent in mauris eu tortor porttitor accumsan. Integer pellentesque quam vel velit. Pellentesque ipsum. Maecenas libero. Nullam faucibus mi quis velit. Etiam dui sem, fermentum vitae, sagittis id, malesuada in, quam. Etiam neque. Maecenas ipsum velit, consectetuer eu lobortis ut, dictum at dui. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur?',
            'created_at' => '2023-02-12 00:00:00',
        ]);
        DB::table('news')->insert([
            'title' => 'Nullam lectus justo',
            'text' => 'Nullam lectus justo, vulputate eget mollis sed, tempor sed magna. In enim a arcu imperdiet malesuada. Maecenas lorem. Aliquam erat volutpat. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? Mauris elementum mauris vitae tortor. In rutrum. Integer rutrum, orci vestibulum ullamcorper ultricies, lacus quam ultricies odio, vitae placerat pede sem sit amet enim. Pellentesque arcu. Mauris dolor felis, sagittis at, luctus sed, aliquam non, tellus. Aenean vel massa quis mauris vehicula lacinia. Pellentesque arcu. Et harum quidem rerum facilis est et expedita distinctio. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Integer vulputate sem a nibh rutrum consequat. Integer malesuada. Fusce consectetuer risus a nunc.',
            'created_at' => '2023-01-18 00:00:00',
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
            'black' => 'user_1',
            'white' => 'user_2',
            'winner' => 'user_2',
            'pgn' => '1. e4 e5 2. Nf3 Nc6 3. Bb5 {Španělská hra} 3... a6
            4. Ba4 Nf6 5. O-O Be7 6. Re1 b5 7. Bb3 d6 8. c3 O-O 9. h3 Nb8  10. d4 Nbd7
            11. c4 c6 12. cxb5 axb5 13. Nc3 Bb7 14. Bg5 b4'
        ]);
        DB::table('events')->insert([
            'name' => 'Muzeum šachu',
            'date' => '2023-12-03 00:00:00',
            'description' => 'Dne 3. 12. 2023 uspořádáme výlet do největšího muzea šachu v ČR. S sebou svačinu a pití.',
        ]);
        DB::table('events')->insert([
            'name' => 'Šachy pod sluncem',
            'date' => '2023-07-12 00:00:00',
            'description' => 'Budeme hrát šachy venku při sluníčku.',
        ]);
        DB::table('events')->insert([
            'name' => 'Minulá akce',
            'date' => '2023-04-12 00:00:00',
            'description' => 'Popis proběhlé akce.',
        ]);

    }
}
