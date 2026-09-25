<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clubsIds = DB::table('clubs')->pluck('id', 'name')->toArray();

        $players = [
            [
                'name' => 'Zion Suzuki',
                'club_id' => $clubsIds['Aston Villa'],
                'api_id' => 118920
            ],
            [
                'name' => 'Daichi Kamada',
                'club_id' => $clubsIds['Crystal Palace FC'],
                'api_id' => 6716
            ],
            [
                'name' => 'Takehiro Tomiyasu',
                'club_id' => $clubsIds['Crystal Palace FC'],
                'api_id' => 9034
            ],
            [
                'name' => 'Kaoru Mitoma',
                'club_id' => $clubsIds['Brighton & Hove Albion FC'],
                'api_id' => 132707
            ],
            [
                'name' => 'Hidemasa Morita',
                'club_id' => $clubsIds['Hull City AFC'],
                'api_id' => 49092
            ],
            [
                'name' => 'Takefusa Kubo',
                'club_id' => $clubsIds['Real Sociedad de Fútbol'],
                'api_id' => 48555
            ],
            [
                'name' => 'Ryunosuke Sato',
                'club_id' => $clubsIds['Valencia CF'],
                'api_id' => 194040
            ],
            [
                'name' => 'Yukinari Sugawara',
                'club_id' => $clubsIds['Cagliari Calcio'],
                'api_id' => 48670
            ],
            [
                'name' => 'Koki Machida',
                'club_id' => $clubsIds['TSG 1899 Hoffenheim'],
                'api_id' => 49031
            ]

        ];
    }
}
