<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('standings')->delete();
        DB::table('matches')->delete();
        DB::table('players')->delete();
        DB::table('clubs')->delete();
        DB::table('leagues')->delete();

        $this->call([ LeagueSeeder::class,
            ClubSeeder::class,
            PlayerSeeder::class,
            MatchSeeder::class,
            StandingSeeder::class,
        ]);

    }
}
