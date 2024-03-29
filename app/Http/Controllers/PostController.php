<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(10);
        return response(view('posts.index', compact('posts')));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return the create post form
        return response(view('posts.create'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the post data
        $validated = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
        ]);

        // create the post
        $post = new Post;
        $post->title = $validated['title'];
        $post->body = $validated['body'];
        $post->user_id = $request->user_id;

        // validate image if present
        if ($request->hasFile('image')) {
            $validated = $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            // store the image
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);

            // save the image path
            $post->image_path = $imageName;
        }

        // save the post
        $post->save();

        // redirect to the post
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // return the specified post
        return response(view('posts.show', compact('post')));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return response(view('posts.edit', compact('post')));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
        ]);

        // update the post
        $post->title = $validated['title'];
        $post->body = $validated['body'];

        // if remove image checkbox is checked
        if ($request->has('remove_image')) {
            // delete the image
            unlink(public_path('images/'.$post->image_path));
            // remove the image path
            $post->image_path = null;
        }
            // if new image is uploaded
        if ($request->hasFile('image')) {
            // validate the image
            $validated = $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            // store the image
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);

            // save the image path
            $post->image_path = $imageName;
        }

        // save the post
        $post->save();

        // redirect to the post
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        // delete the post
        $post->delete();

        // redirect to the posts index
        return redirect()->route('posts.index');
    }
}
