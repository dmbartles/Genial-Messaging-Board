<?php

use Illuminate\Database\Seeder;
use App\Tag;

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

    $count = count($post_tags);

    foreach ($post_tags as $key => $post_tag) {
      Tag::insert([
        'created_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
        'post_id' => $post_tag[0],
        'tag_id' => $post_tag[1]
      ]);
      $count--;
    }
  }
}
