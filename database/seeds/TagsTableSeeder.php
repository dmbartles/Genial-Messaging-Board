<?php
use Illuminate\Database\Seeder;
use App\Tag;
class TagsTableSeeder extends Seeder
{
    public function run()
    {
        $tags = ['Science',
        'Literature',
        'TV',
        'Movies',
        'Exercise',
        'Wealth',
        'Hobbies',
        'News',
        'Politics',
        'Nature',
        'Animals',
        'Relationships',
        'Advice',
        'Poems',
        'Other',
        'Military'
      ];
        foreach ($tags as $tagName) {
            $tag = new Tag();
            $tag->tag = $tagName;
            $tag->save();
        }
    }
}
