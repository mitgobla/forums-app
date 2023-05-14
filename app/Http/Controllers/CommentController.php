<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $_comment = new Comment();
        $_comment->body = $request->input('body');
        $_comment->user_id = $request->input('user_id');
        $_comment->post_id = $request->input('post_id');
        $_comment->save();




        if ($request->ajax()) {
            return response()->json([
                'message' => 'Comment created successfully',
                'comment_body' => $_comment->body,
                'comment_user' => $_comment->user->name,
                'comment_user_id' => $_comment->user->id,
                'comment_created_at' => $_comment->created_at->diffForHumans(),
            ]);
        }

        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {

            return view('comments.edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
