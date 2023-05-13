<?php

namespace Database\Seeders;

use App\Models\Comment;
use Database\Factories\CommentFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comment = new Comment();
        $comment->body = 'This is my first comment';
        $comment->user_id = 1;
        $comment->post_id = 1;
        $comment->save();

        CommentFactory::new()->count(250)->create();
    }
}
