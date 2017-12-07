<?php
use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{

    public function run()
    {


        $this->call(User_BiosTableSeeder::class);
        $this->call(User_TopicsTableSeeder::class);
      $this->call(PostsTableSeeder::class);
                $this->call(BooksTableSeeder::class);
                        $this->call(CommentsTableSeeder::class);
    }
}
