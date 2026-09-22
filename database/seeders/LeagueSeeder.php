<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LeagueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $leagues = [[
                'name' => 'Premier League',
                'country' => 'England',
                'api_id' => 2021,
            ],
            [
                'name' => 'Primera Division',
                'country' => 'Spain',
                'api_id' => 2014,
            ],
            [
                'name' => 'Bundesliga',
                'country' => 'Germany',
                'api_id' => 2002,
            ],
            [
                'name' => 'Serie A',
                'country' => 'Italy',
                'api_id' => 2019,
            ],
            [
                'name' => 'Ligue 1',
                'country' => 'France',
                'api_id' => 2015,
            ],
            [
                'name' => 'Eredivisie',
                'country' => 'Netherlands',
                'api_id' => 2003,
            ],
            ];
        $timestampColumns = [
            'created_at' => now(),
            'updated_at' => now()
        ];
        $insert = array_map(fn($v) => array_merge($v, $timestampColumns), $leagues);
        DB::table('leagues')->delete();
        DB::table('leagues')->insert($insert);
    }
}
