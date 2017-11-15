<?php

use Illuminate\Database\Seeder;
use App\User_topic;

class User_TopicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $user_topics = [
          ['Bob Smith','Environment'],
          ['Bob Smith','Sports'],
          ['Jane Smith','Environment'],
          ['Jane Smith','Sports'],
          ['John Trump','Environment'],
          ['John Trump','Sports'],
          ['Anne Roads','Environment'],
          ['Anne Roads','Sports'],
      ];

      $count = count($user_topics);

      foreach ($user_topics as $key => $user_topic) {
          User_topic::insert([
              'created_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
              'updated_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
              'user_name' => $user_topic[0],
              'topic' => $user_topic[1],
          ]);
          $count--;

      }
    }
}
