<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentPostRequest;
use App\Models\BlogPost;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function storeParentComment(CommentPostRequest $request, BlogPost $post) {
        $comment = $request->validated()['comment'];

        Comment::create([
            'content' => $comment,
            'blog_post_id' => $post->id,
            'user_id' => auth()->id()
        ]);

        return back();
    }

    public function storeChildComment(CommentPostRequest $request, Comment $parentComment) {
        $comment = $request->validated()['comment'];

        Comment::create([
            'content' => $comment,
            'parent_id' => $parentComment->id,
            'user_id' => auth()->id()
        ]);

        return back();
    }

    public function edit(Comment $comment) {

    }

    public function update(Request $request, Comment $comment) {
        
    }

    public function destroy(Comment $comment) {
        $comment->delete();

        return back();
    }
}
