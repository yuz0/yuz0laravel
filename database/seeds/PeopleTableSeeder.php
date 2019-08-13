<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeopleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => 'Robert Downey Jr.',
            'mail' => 'ironman@avengers',
            'age' => 54,
        ];
        DB::table('people')->insert($param);
    }
}
