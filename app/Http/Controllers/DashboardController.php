<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Show the application homepage.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::find(auth()->user()->id);
        $posts = $user->posts()->paginate(10, ['*'], 'posts');

        // get all comments made by the user
        $comments = Comment::where('user_id', $user->id)->paginate(10, ['*'], 'comments');

        return view('dashboard', compact('user', 'posts', 'comments'));
    }
}
