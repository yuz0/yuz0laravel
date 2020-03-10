<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(PeopleTableSeeder::class);
        // $this->call(AnswersTableSeeder::class);
        // $this->call(AgesTableSeeder::class);
        $this->call(TheatersTableSeeder::class);
        $this->call(FeedbacksTableSeeder::class);
    }
}
