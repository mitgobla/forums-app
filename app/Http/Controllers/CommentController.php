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
        //validate comment
        $validated = $request->validate([
            'body' => 'required|max:1000',
            'user_id' => 'required',
            'post_id' => 'required',
        ]);

        //create comment
        $comment = new Comment();
        $comment->body = $validated['body'];
        $comment->user_id = $validated['user_id'];
        $comment->post_id = $validated['post_id'];
        $comment->save();

        if ($request->ajax()) {
            return response()->json([
                'message' => 'Comment created successfully',
                'comment_body' => $comment->body,
                'comment_user' => $comment->user->name,
                'comment_user_id' => $comment->user->id,
                'comment_created_at' => $comment->created_at->diffForHumans(),
                'comment_template' => view('comments.partials.comment_card', compact('comment'))->render(),
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

            return response(view('comments.edit', compact('comment')));
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

        //validate comment
        $validated = $request->validate([
            'body' => 'required|max:1000',
        ]);

        //update comment
        $comment->body = $validated['body'];
        $comment->save();

        return redirect()->route('posts.show', $comment->post_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {

            //delete comment
            $comment->delete();

            if (request()->ajax()) {
                return response()->json([
                    'message' => 'Comment deleted successfully',
                ]);
            }

            return redirect()->back();
    }
}
