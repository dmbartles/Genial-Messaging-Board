<?php

use Illuminate\Database\Seeder;
use App\User_bio;

class User_BiosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $user_bios = [
          ['Bob Smith','I like hunting cause I like eating!'],
          ['Jane Smith','It is getting hot in here'],
          ['John Trump','I do not believe in global warming, but I rarely leave air conditioning'],
          ['Anne Roads','I hate you, Trump!'],
      ];

      $count = count($user_bios);

      foreach ($user_bios as $key => $user_bio) {
          User_bio::insert([
              'created_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
              'updated_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
              'user_name' => $user_bio[0],
              'bio_text' => $user_bio[1],
          ]);
          $count--;

      }


    }
}
