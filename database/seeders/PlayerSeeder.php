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
                'club_id' => $clubsIds['Aston Villa FC'],
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
            ],
            [
                'name' => 'Hiroki Ito',
                'club_id' => $clubsIds['FC Bayern München'],
                'api_id' => 48657
            ],
            [
                'name' => 'Kaishu Sano',
                'club_id' => $clubsIds['1. FSV Mainz 05'],
                'api_id' => 114809
            ],
            [
                'name' => 'Sota Kawasaki',
                'club_id' => $clubsIds['1. FSV Mainz 05'],
                'api_id' => 147832
            ],
            [
                'name' => 'Rihito Yamamoto',
                'club_id' => $clubsIds['SC Freiburg'],
                'api_id' => 114219
            ],
            [
                'name' => 'Yuito Suzuki',
                'club_id' => $clubsIds['SC Freiburg'],
                'api_id' => 145293
            ],
            [
                'name' => 'Keisuke Goto',
                'club_id' => $clubsIds['SC Freiburg'],
                'api_id' => 274204
            ],
            [
                'name' => 'Daiki Hashioka',
                'club_id' => $clubsIds['Borussia Mönchengladbach'],
                'api_id' => 48834
            ],
            [
                'name' => 'Ko Itakura',
                'club_id' => $clubsIds['Borussia Mönchengladbach'],
                'api_id' => 48902
            ],
            [
                'name' => 'Zento Uno',
                'club_id' => $clubsIds['Borussia Mönchengladbach'],
                'api_id' => 246946
            ],
            [
                'name' => 'Shuto Machino',
                'club_id' => $clubsIds['Borussia Mönchengladbach'],
                'api_id' => 189850
            ],
            [
                'name' => 'Keita Kosugi',
                'club_id' => $clubsIds['Eintracht Frankfurt'],
                'api_id' => 249811
            ],
            [
                'name' => 'Ritsu Doan',
                'club_id' => $clubsIds['Eintracht Frankfurt'],
                'api_id' => 7531
            ],
            [
                'name' => 'Ayase Ueda',
                'club_id' => $clubsIds['Lille OSC'],
                'api_id' => 119460
            ],
            [
                'name' => 'Ayumu Seko',
                'club_id' => $clubsIds['Le Havre AC'],
                'api_id' => 113230
            ],
            [
                'name' => 'Kaito Mizuta',
                'club_id' => $clubsIds['Le Havre AC'],
                'api_id' => 150018
            ],
            [
                'name' => 'Sota Nakamura',
                'club_id' => $clubsIds['Le Havre AC'],
                'api_id' => 275182
            ],
            [
                'name' => 'Takumi Minamino',
                'club_id' => $clubsIds['AS Monaco FC'],
                'api_id' => 15100
            ],
            [
                'name' => 'Kodai Sano',
                'club_id' => $clubsIds['PSV'],
                'api_id' => 217935
            ],
            [
                'name' => 'Tsuyoshi Watanabe',
                'club_id' => $clubsIds['Feyenoord Rotterdam'],
                'api_id' => 113595
            ],
            [
                'name' => 'Seiya Maikuma',
                'club_id' => $clubsIds['AZ'],
                'api_id' => 142616
            ],
            [
                'name' => 'Rion Ichihara',
                'club_id' => $clubsIds['AZ'],
                'api_id' => 291986
            ],
            [
                'name' => 'Shunsuke Mito',
                'club_id' => $clubsIds['Sparta Rotterdam'],
                'api_id' => 161068
            ],
        ];

        $timestampColumns = [
            'created_at' => now(),
            'updated_at' => now()
        ];

        $insert = array_map(fn($v) => array_merge($v, $timestampColumns), $players);

        DB::table('players')->delete();
        DB::table('players')->insert($insert);
    }
}
