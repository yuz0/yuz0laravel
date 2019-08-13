<?php

use Illuminate\Database\Seeder;

class AnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $item = [
            'id' => 1,
            'fullname' => 'yuzo kikuchi',
            'gender' => 1,
            'age_id' => 2,
            'email' => 'yuzo@gmail.com',
            'send_email' => 0,
            'feedback' => 'アイウエオ',
            'created_at' => '2019-01-01 12:00:00',
            'updated_at' => '2019-02-02 14:00:00',
            'deleted_at' => '2019-03-03 15:00:00',
        ];
        DB::table('answers')->insert($item);
    }
}
