<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StandingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $leagueIds = DB::table('leagues')->pluck('id', 'name')->toArray();
        $clubIds = DB::table('clubs')->pluck('id', 'name')->toArray();
        $premierClubs = [
            'Crystal Palace FC',
            'Aston Villa FC',
            'Manchester City FC',
            'Hull City AFC',
            'Brighton & Hove Albion FC',
        ];

        $totalPremierClubs = count($premierClubs);
        $result = [];
        // won/lost/goals_for/goals_againstはpositionから計算式で算出し、
        // played_games/points/goal_differenceはさらにそこから導出する。
        // 手入力だと矛盾(played_games ≠ won+draw+lost 等)やtypoのリスクがあるため計算式に統一。
        // draw(引き分け)は計算を単純にするため一律1固定。
        foreach ($premierClubs as $i => $clubName) {
            $position = $i + 1;
            $won = $totalPremierClubs - $position;
            $draw = 1;
            $lost = $position - 1;
            $playedGames = $won + $draw + $lost;
            $points = $won* 3 + $draw* 1;
            $goalsFor = ($totalPremierClubs - $position) * 3 + 10;
            $goalsAgainst = ($totalPremierClubs - $position)* 2 + 5;
            $goalDifference = $goalsFor - $goalsAgainst;

            $result[] = [
                'league_id' => $leagueIds['Premier League'],
                'club_id' => $clubIds[$clubName],
                'position' => $position,
                'played_games' => $playedGames,
                'won' => $won,
                'draw' => $draw,
                'lost' => $lost,
                'points' => $points,
                'goals_for' => $goalsFor,
                'goals_against' => $goalsAgainst,
                'goal_difference' => $goalDifference,
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        $laLigaClubs = [
            'Real Sociedad de Fútbol',
            'Valencia CF',
            'FC Barcelona',
            'Real Madrid CF',
            'Club Atlético de Madrid',
        ];
        $totalLaLigaClubs = count($laLigaClubs);
        foreach ($laLigaClubs as $i => $clubName) {
            $position = $i + 1;
            $won = $totalLaLigaClubs - $position;
            $draw = 1;
            $lost = $position - 1;
            $playedGames = $won + $draw + $lost;
            $points = $won * 3 + $draw * 1;
            $goalsFor = ($totalLaLigaClubs - $position) * 3 + 10;
            $goalsAgainst = ($totalLaLigaClubs - $position) * 2 + 5;
            $goalDifference = $goalsFor - $goalsAgainst;

            $result[] = [
                'league_id' => $leagueIds['Primera Division'],
                'club_id' => $clubIds[$clubName],
                'position' => $position,
                'played_games' => $playedGames,
                'won' => $won,
                'draw' => $draw,
                'lost' => $lost,
                'points' => $points,
                'goals_for' => $goalsFor,
                'goals_against' => $goalsAgainst,
                'goal_difference' => $goalDifference,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        $bundesligaClubs = [
            'Eintracht Frankfurt',
            '1. FSV Mainz 05',
            'SC Freiburg',
            'Borussia Mönchengladbach',
            'TSG 1899 Hoffenheim',
            'FC Bayern München'
        ];

        $totalBundesligaClubs = count($bundesligaClubs);
        foreach ($bundesligaClubs as $i => $clubName) {
            $position = $i + 1;
            $won = $totalBundesligaClubs - $position;
            $draw = 1;
            $lost = $position - 1;
            $playedGames = $won + $draw + $lost;
            $points = $won * 3 + $draw * 1;
            $goalsFor = ($totalBundesligaClubs - $position) * 3 + 10;
            $goalsAgainst = ($totalBundesligaClubs - $position) * 2 + 5;
            $goalDifference = $goalsFor - $goalsAgainst;

            $result[] = [
                'league_id' => $leagueIds['Bundesliga'],
                'club_id' => $clubIds[$clubName],
                'position' => $position,
                'played_games' => $playedGames,
                'won' => $won,
                'draw' => $draw,
                'lost' => $lost,
                'points' => $points,
                'goals_for' => $goalsFor,
                'goals_against' => $goalsAgainst,
                'goal_difference' => $goalDifference,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }


        DB::table('standings')->insert($result);
    }
}
