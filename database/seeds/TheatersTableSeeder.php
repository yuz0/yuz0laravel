<?php

use Illuminate\Database\Seeder;

class TheatersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $theaters = [
            [
                'id' => 1,
                'theaterName' => 'グランドシネマサンシャイン',
                'name_eng' => 'grandcinemasunshine',
                'spec_id' => 1,
                'spec' => 'IMAXレーザー/GTテクノロジー',
                'corp_id' => 1,
                'region_id' => 1,
                'area' => '東京都 池袋',
                'img' => 'theater_pic1.png',
                'size' => 'W25.8m × H18.9m',
                'seats' => '542(2)',
                'explain' => 'IMAX、4DXwithScreenX、BESTIA(2スクリーン)',
                'link' => 'https://www.cinemasunshine.co.jp/theater/gdcs/',
                'map' => 'グランドシネマサンシャイン',
            ],
            [
                'id' => 2,
                'theaterName' => '109シネマズ',
                'name_eng' => '109cinemas_osaka-expocity',
                'spec_id' => 1,
                'spec' => 'IMAXレーザー/GTテクノロジー',
                'corp_id' => 2,
                'region_id' => 2,
                'area' => '大阪府 吹田市',
                'img' => 'theater_pic2.jpg',
                'size' => 'W26.0m × H18.0m',
                'seats' => '404(3)',
                'explain' => 'IMAX、4DX',
                'link' => 'https://109cinemas.net/osaka-expocity/',
                'map' => '109シネマズ 大阪エキスポシティ',
            ],
            [
                'id' => 3,
                'theaterName' => 'Tジョイ 博多',
                'name_eng' => 't-joy_hakata',
                'spec_id' => 1,
                'spec' => 'Dolby Cinema',
                'corp_id' => 5,
                'region_id' => 4,
                'area' => '福岡県 福岡市',
                'img' => 'theater_pic3.jpg',
                'size' => '',
                'seats' => '346(2)',
                'explain' => 'Dolby Cinema',
                'link' => 'https://tjoy.jp/t-joy_hakata',
                'map' => 'Ｔ・ジョイ 博多',
            ],
            [
                'id' => 4,
                'theaterName' => 'MOVIX さいたま',
                'name_eng' => 'movix_saitama',
                'spec_id' => 1,
                'spec' => 'Dolby Cinema',
                'corp_id' => 7,
                'region_id' => 1,
                'area' => '埼玉県 さいたま市',
                'img' => 'theater_pic4.jpg',
                'size' => 'W13.92m × H5.80m',
                'seats' => '292(2)',
                'explain' => 'Dolby Cinema',
                'link' => 'https://www.smt-cinema.com/site/saitama/index.html',
                'map' => 'MOVIXさいたま',
            ],
            [
                'id' => 5,
                'theaterName' => '梅田ブルク7',
                'name_eng' => 'umeda_burg7',
                'spec_id' => 1,
                'spec' => 'Dolby Cinema',
                'corp_id' => 5,
                'region_id' => 2,
                'area' => '大阪府 大阪市',
                'img' => 'theater_pic5.jpg',
                'size' => '',
                'seats' => '376(2)',
                'explain' => 'Dolby Cinema',
                'link' => 'https://tjoy.jp/umeda_burg7',
                'map' => '梅田ブルク７',
            ],
            [
                'id' => 6,
                'theaterName' => '丸の内ピカデリー',
                'name_eng' => 'marunouchi_smt',
                'spec_id' => 1,
                'spec' => 'Dolby Cinema',
                'corp_id' => 7,
                'region_id' => 1,
                'area' => '東京都 千代田区',
                'img' => 'theater_pic6.jpg',
                'size' => 'W15m × H7.13m',
                'seats' => '255(2)',
                'explain' => 'Dolby Cinema',
                'link' => 'https://www.smt-cinema.com/site/marunouchi/index.html',
                'map' => '丸の内ピカデリー',
            ]
        ];
        DB::table('theaters')->insert($theaters);
    }
}
