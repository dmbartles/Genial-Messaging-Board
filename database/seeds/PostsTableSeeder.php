<?php
use Illuminate\Database\Seeder;
use App\Post;

class PostsTableSeeder extends Seeder
{
    public function run()
    {
      $posts = [
          ['Bob Smith','Hunting','Sports','I like hunting cause I like eating! There are many ways to hunt, I most prefer videogame hunting. I play Deer Hunter a lot at my local Arcade. Alas, I shall never know the glory of a real hunt....'],
          ['Jane Smith','Flat World Proof','Environment','If the world was round none of our cell phones could call each other. Obviously, they would lose line of sight due to the curvature of the earth. Plus, birds would get lost all of the time. Thus, the world is flat.'],
          ['John Trump','Global Warming','Environment','I do not believe in global warming, but I rarely leave air conditioning. I have not had to change the setting from 65 degrees in my entire life. Therefore, the globe could not possibly be getting hotter'],
          ['Anne Roads','New Cure','Environment','Sorry guys, This is just click bait. Goto www.amazon.com!'],
      ];

      $count = count($posts);
      foreach ($posts as $key => $post) {
          Post::insert([
              'created_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
              'updated_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
              'user_name' => $post[0],
              'topic' => $post[2],
              'subtopic' => $post[1],
              'post_text' => $post[3]
          ]);
          $count--;
      }
    }
}
