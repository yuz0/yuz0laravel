<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Weidner\Goutte\GoutteFacade as GoutteFacade;


class imaxDolbyController extends Controller
{
    public function index(){
         $goutte = GoutteFacade::request('GET', 'https://www.imax.com/ja');
         $theater_imgs = [];
         $theater_txts = [];

         $goutte->filter('.full-size')->filter('img')
         ->each(function($node) use (&$theater_imgs){
             $theater_imgs[] = $node->attr('src');
         });

        $params = [
             'theater_imgs' => $theater_imgs,
             'theater_txts' => $theater_txts,
            'regions' => self::regions(),
            'theatersCorps' => self::theaterCorps(),
        ];
        return view('IMAX.indeximax', $params);
    }

    public function show(Request $request){
        $region_id = $request->input('s_region');
        $corp_id = $request->input('s_corp');
        $spec_id = $request->input('s_spec');

        $query = DB::table('theaters');

        if($region_id != 0){
            $query->where('region_id', $region_id);
        }
        if($corp_id != 0){
            $query->where('corp_id', $corp_id);
        }
        if($spec_id != 0){
            $query->where('spec_id', $spec_id);
        }
        $theaters = $query->get();

        for($i = 1; $i <= 6; $i++){
            $feedbacks[$i] = DB::table('feedbacks')->where('theaterId', $i)->get();
            $stars[$i] = 0;
            $count[$i] = 0;
            foreach($feedbacks[$i] as $feedback[$i]){
                $stars[$i] += $feedback[$i]->evaluation;
                $count[$i] += 1;
            }
            if($count[$i] > 0){
                    $stars[$i] /= $count[$i];
                }else{
                    $stars[$i] = 0;
                }
        }

        // function e($value, $doubleEncode = false){
        //     if ($value instanceof Htmlable) {
        //         return $value->toHtml();
        //     }
        //     return htmlspecialchars($value, ENT_QUOTES, 'UTF-8', $doubleEncode);
        // }

        $params = [
            'theaters' => $theaters,
            // 'feedbacks' => $feedbacks,
            'stars' => $stars,
            'exist' => $theaters->isEmpty(),
        ];

        return view('IMAX.show', $params);
    }

    public function info($name_eng){
        $theater = DB::table('theaters')->where('name_eng', $name_eng)->first();

        $params = [
            'theater' => $theater,
        ];
        return view('IMAX.info', $params);
    }

    public static function regions(){
        return [
            '関東',
            '近畿',
            '中部',
            '九州',
            '北海道、東北',
            '中国、四国',
        ];
        // id: 1~6
    }

    public static function theaterCorps(){
        return [
            'シネマサンシャイン',
            '109シネマズ',
            'ユナイテッド・シネマ',
            'TOHOシネマズ',
            'Tジョイ',
            'イオンシネマ',
            '松竹マルチプレックスシアターズ',
        ];
        // id: 1~7 その他:10
    }
}
