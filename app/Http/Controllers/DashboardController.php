<?php

namespace App\Http\Controllers;

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
        $comments = $user->comments()->paginate(10, ['*'], 'comments');
        return view('dashboard', compact('user', 'posts', 'comments'));
    }
}
