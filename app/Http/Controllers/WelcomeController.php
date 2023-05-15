<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Show the application homepage.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $recentPosts = Post::orderBy('created_at', 'desc')->take(3)->get();
        // get posts with highest number of comments
        $mostCommentedPosts = Post::withCount('comments')->orderBy('comments_count', 'desc')->take(3)->get();
        return view('welcome', compact('recentPosts', 'mostCommentedPosts'));
    }
}
