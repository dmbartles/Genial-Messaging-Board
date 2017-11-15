<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $posts = [
          ['Bob Smith','Hunting','Sports','I like hunting cause I like eating!'],
          ['Jane Smith','Global Warming','Environment','It is getting hot in here'],
          ['John Trump','Global Warming','Environment','I do not believe in global warming, but I rarely leave air conditioning'],
          ['Anne Roads','Global Warming','Environment','I hate you, Trump!'],
      ];

      $count = count($posts);

      foreach ($posts as $key => $post) {
          Post::insert([
              'created_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
              'updated_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
              'user_name' => $post[0],
              'topic' => $post[2],
              'subject' => $post[1],
              'post_text' => $post[3],
          ]);
          $count--;
      }

    }
}
