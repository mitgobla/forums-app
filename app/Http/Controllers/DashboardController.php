<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use App\Services\WeatherService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    protected $weatherService;

    public function __construct(WeatherService $weatherService)
    {
        $this->weatherService = $weatherService;
    }

    /**
     * Show the application homepage.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::find(auth()->user()->id);
        $posts = $user->posts()->paginate(5, ['*'], 'posts');

        // get all comments made by the user
        $comments = Comment::where('user_id', $user->id)->paginate(5, ['*'], 'comments');
        $weather = $this->weatherService->getWeather('London');

        return view('dashboard', compact('user', 'posts', 'comments', 'weather'));
    }
}
