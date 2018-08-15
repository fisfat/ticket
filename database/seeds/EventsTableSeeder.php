<?php

use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('events')->insert([
            'title' => str_random(8),
            'description' => str_random(100),
            'user_id' => rand(1, 2),
            'event_id' => rand(1,5),

        ]);
    }
}
