<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClubSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // seeder再実行のたびleagues.idが変動するため、nameをキーに動的に解決する
        $leagueIds = DB::table('leagues')->pluck('id', 'name')->toArray();

        $clubs = [
            [
                'league_id' => $leagueIds['Premier League'],
                'name' => 'Crystal Palace FC',
                'api_id' => 354,
            ],
            [
                'league_id' => $leagueIds['Premier League'],
                'name' => 'Aston Villa FC',
                'api_id' => 58,
            ],
            [
                'league_id' => $leagueIds['Premier League'],
                'name' => 'Manchester City FC',
                'api_id' => 65,
            ],
            [
                'league_id' => $leagueIds['Premier League'],
                'name' => 'Hull City AFC',
                'api_id' => 322,
            ],
            [
                'league_id' => $leagueIds['Premier League'],
                'name' => 'Brighton&Hove Albion FC',
                'api_id' => 397,
            ],
            [
                'league_id' => $leagueIds['Primera Division'],
                'name' => 'Real Sociedad de Fútbol',
                'api_id' => 92,
            ],
            [
                'league_id' => $leagueIds['Primera Division'],
                'name' => 'Valencia CF',
                'api_id' => 95,
            ],
            [
                'league_id' => $leagueIds['Primera Division'],
                'name' => 'FC Barcelona',
                'api_id' => 81,
            ],
            [
                'league_id' => $leagueIds['Primera Division'],
                'name' => 'Real Madrid CF',
                'api_id' => 86,
            ],
            [
                'league_id' => $leagueIds['Primera Division'],
                'name' => 'Club Atlético de Madrid',
                'api_id' => 78,
            ],
            [
                'league_id' => $leagueIds['Serie A'],
                'name' => 'Cagliari Calcio',
                'api_id' => 104,
            ],
            [
                'league_id' => $leagueIds['Serie A'],
                'name' => 'FC Internazionale Milano',
                'api_id' => 108
            ],
            [
                'league_id' => $leagueIds['Serie A'],
                'name' => 'AC Milan',
                'api_id' => 98
            ],
            [
                'league_id' => $leagueIds['Serie A'],
                'name' => 'Juventus FC',
                'api_id' => 109
            ],
            [
                'league_id' => $leagueIds['Serie A'],
                'name' => 'AS Roma',
                'api_id' => 100
            ],
            [
                'league_id' => $leagueIds['Bundesliga'],
                'name' => 'Eintracht Frankfurt',
                'api_id' => 19
            ],
            [
                'league_id' => $leagueIds['Bundesliga'],
                'name' => '1.FSV Mainz 05',
                'api_id' => 15
            ],
            [
                'league_id' => $leagueIds['Bundesliga'],
                'name' => 'SC Freiburg',
                'api_id' => 17
            ],
            [
                'league_id' => $leagueIds['Bundesliga'],
                'name' => 'Borussia Mönchengladbach',
                'api_id' => 18
            ],
            [
                'league_id' => $leagueIds['Bundesliga'],
                'name' => 'TSG 1899 Hoffenheim',
                'api_id' => 2
            ],
            [
                'league_id' => $leagueIds['Bundesliga'],
                'name' => 'FC Bayern München',
                'api_id' => 5
            ],
            [
                'league_id' => $leagueIds['Ligue 1'],
                'name' => 'AS Monaco FC',
                'api_id' => 548
            ],
            [
                'league_id' => $leagueIds['Ligue 1'],
                'name' => 'Lille OSC',
                'api_id' => 521
            ],
            [
                'league_id' => $leagueIds['Ligue 1'],
                'name' => 'Olympique Lyonnais',
                'api_id' => 523
            ],
            [
                'league_id' => $leagueIds['Ligue 1'],
                'name' => 'Le Harve AC',
                'api_id' => 533
            ],
            [
                'league_id' => $leagueIds['Ligue 1'],
                'name' => 'Paris Saint-Germain FC',
                'api_id' => 524
            ],
            [
                'league_id' => $leagueIds['Eredivisie'],
                'name' => 'Feyenoord Rotterdam',
                'api_id' => 675
            ],
            [
                'league_id' => $leagueIds['Eredivisie'],
                'name' => 'PSV',
                'api_id' => 674
            ],
            [
                'league_id' => $leagueIds['Eredivisie'],
                'name' => 'Sparta Rotterdam',
                'api_id' => 6806
            ],
            [
                'league_id' => $leagueIds['Eredivisie'],
                'name' => 'AZ',
                'api_id' => 682
            ],
        ];

        $timestampColumns = [
            'created_at' => now(),
            'updated_at' => now()
        ];

        // insert()は1クエリで済むため、Eloquentのcreate()を29回呼ぶより効率的
        $insert = array_map(fn($v) => array_merge($v, $timestampColumns), $clubs);

        DB::table('clubs')->delete();
        DB::table('clubs')->insert($insert);
    }
}
