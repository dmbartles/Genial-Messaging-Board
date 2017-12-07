<?php

use Illuminate\Database\Seeder;
use App\Comment;

class CommentsTableSeeder extends Seeder
{
  public function run()
  {
    $comments = [
      ['Bob Smith','1','You are amazing'],
      ['Jane Smith','4','Nobody will believe you'],
      ['John Trump','4','HAHAHAHAHAHAH!!!'],
      ['Anne Roads','4','I hate you, Trump! Now and forever!!!!!'],
    ];

    $count = count($comments);

    foreach ($comments as $key => $comment) {
      Comment::insert([
        'created_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
        'user_name' => $comment[0],
        'post_id' => $comment[1],
        'comment_text' => $comment[2],
      ]);
      $count--;
    }


  }
}
