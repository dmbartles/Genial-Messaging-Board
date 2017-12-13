<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostTagTableSeeder extends Seeder
{
  public function run()
  {
    $post_tags = [
      [1,1],
      [2,2],
      [3,3],
      [4,4],
    ];

      foreach ($post_tags as $post_tag) {
        $post = Post::where('id','=',$post_tag[0])->first();
        $post->tags()->attach($post_tag[1]);
      }
  }
}
