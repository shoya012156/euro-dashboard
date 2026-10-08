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

        $clubIds = DB::table('clubs')->pluck('id', 'name')->toArray();

        $matches = [
            [
                'league_id' => $leagueIds['Primera Division'],
                'home_club_id' => $clubIds['Real Sociedad de Fútbol'],
                'away_club_id' => $clubIds['FC Barcelona'],
                'match_date' => now()->subDays(5),
                'match_status' => MatchStatus::FINISHED,
                'home_score' => 3,
                'away_score' => 0,
                'api_id' => 900001,
            ],
            [
                'league_id' => $leagueIds['Bundesliga'],
                'home_club_id' => $clubIds['SC Freiburg'],
                'away_club_id' => $clubIds['Eintracht Frankfurt'],
                'match_date' => now()->subDays(3),
                'match_status' => MatchStatus::FINISHED,
                'home_score' => 1,
                'away_score' => 2,
                'api_id' => 900002,
            ],
            [
                'league_id' => $leagueIds['Premier League'],
                'home_club_id' => $clubIds['Manchester City FC'],
                'away_club_id' => $clubIds['Aston Villa FC'],
                'match_date' => now()->subDays(1),
                'match_status' => MatchStatus::FINISHED,
                'home_score' => 0,
                'away_score' => 0,
                'api_id' => 900003,
            ],
            [
                'league_id' => $leagueIds['Serie A'],
                'home_club_id' => $clubIds['Cagliari Calcio'],
                'away_club_id' => $clubIds['FC Internazionale Milano'],
                'match_date' => now()->subDays(10),
                'match_status' => MatchStatus::FINISHED,
                'home_score' => 0,
                'away_score' => 3,
                'api_id' => 900004,
            ],
            [
                'league_id' => $leagueIds['Ligue 1'],
                'home_club_id' => $clubIds['Lille OSC'],
                'away_club_id' => $clubIds['AS Monaco FC'],
                'match_date' => now()->addDays(10),
                'match_status' => MatchStatus::TIMED,
                'home_score' => null,
                'away_score' => null,
                'api_id' => 900005,
            ],
            [
                'league_id' => $leagueIds['Eredivisie'],
                'home_club_id' => $clubIds['PSV'],
                'away_club_id' => $clubIds['Feyenoord Rotterdam'],
                'match_date' => now(),
                'match_status' => MatchStatus::IN_PLAY,
                'home_score' => null,
                'away_score' => null,
                'api_id' => 900006,
            ],
            [
                'league_id' => $leagueIds['Primera Division'],
                'home_club_id' => $clubIds['Valencia CF'],
                'away_club_id' => $clubIds['Real Madrid CF'],
                'match_date' => now()->addDays(2),
                'match_status' => MatchStatus::TIMED,
                'home_score' => null,
                'away_score' => null,
                'api_id' => 900007,
            ],
            [
                'league_id' => $leagueIds['Bundesliga'],
                'home_club_id' => $clubIds['Borussia Mönchengladbach'],
                'away_club_id' => $clubIds['1. FSV Mainz 05'],
                'match_date' => now()->addDays(4),
                'match_status' => MatchStatus::TIMED,
                'home_score' => null,
                'away_score' => null,
                'api_id' => 900008,
            ],
            [
                'league_id' => $leagueIds['Ligue 1'],
                'home_club_id' => $clubIds['Le Havre AC'],
                'away_club_id' => $clubIds['Olympique Lyonnais'],
                'match_date' => now()->addDays(6),
                'match_status' => MatchStatus::TIMED,
                'home_score' => null,
                'away_score' => null,
                'api_id' => 900009,
            ],
            [
                'league_id' => $leagueIds['Eredivisie'],
                'home_club_id' => $clubIds['AZ'],
                'away_club_id' => $clubIds['Sparta Rotterdam'],
                'match_date' => now()->subDays(2),
                'match_status' => MatchStatus::POSTPONED,
                'home_score' => null,
                'away_score' => null,
                'api_id' => 900010,
            ]
        ];

        $timestampColumns = [
            'created_at' => now(),
            'updated_at' => now()
        ];

        $insert = array_map(fn($v) => array_merge($v, $timestampColumns), $matches);

        DB::table('matches')->insert($insert);
    }
}
