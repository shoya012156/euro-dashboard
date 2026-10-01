<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Enums\MatchStatus;

class MatchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $leagueIds = DB::table('leagues')->pluck('id', 'name')->toArray();

        $homeClubIds = DB::table('clubs')->pluck('id', 'name')->toArray();

        $awayClubIds = DB::table('clubs')->pluck('id', 'name')->toArray();

        $matches = [
            'league_id' => $leagueIds['Primera Division'],
            'home_club_id' => $homeClubIds['Real Sociedad de Fútbol'],
            'away_club_id' => $awayClubIds['FC Barcelona'],
            'match_date' => now()->subdays(5),
            'match_status' => MatchStatus::FINISHED,
            'home_score' => 3,
            'away_score' => 0,
            
        ];
    }
}
