<?php

use Illuminate\Database\Seeder;

class FeedbacksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $feedback = [
            'id' => 0,
            'name' => 'example',
            'theaterId' => 1,
            'evaluation' => 5,
            'feedback' => '入力してください'
        ];
        DB::table('feedbacks')->insert($feedback);
    }
}
