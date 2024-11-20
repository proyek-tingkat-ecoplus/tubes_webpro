<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        for ($i = 1; $i < 10; $i++) {
            for ($j = 0; $j < 2; $j++) {
                $comment = Comment::create([
                    'user_id' => $i,
                    'forum_id' => $i,
                    'content' => $faker->sentence,
                ]);

                if($j > 0) {
                    $comment->parent_id = $comment->id -1;
                    $comment->save();
                }
            }
        }
    }
}
