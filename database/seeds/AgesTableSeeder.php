<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AgesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            1 => '10代以下',
            2 => '20代',
            3 => '30代',
            4 => '40代',
            5 => '50代',
            6 => '60代以上'
        ];
        foreach ($param as $key => $value) {
            DB::table('ages')->insert([
                'id' => $key,
                'age' => $value,
                'sort' => $key,
            ]);


        }

    }
}
