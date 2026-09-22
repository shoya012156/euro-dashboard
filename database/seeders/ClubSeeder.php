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
        $leagueIds = DB::table('leagues')->pluck('id', 'name')->toArray();

        $clubs = [
            [
                'league_id' => $leagueIds['Premier League'],
                'name' => 'Crystal Palace',
                'api_id' => 354,
            ],
        ];

        $timestampColumns = [
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
