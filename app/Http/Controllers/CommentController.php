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

        $newComment = Comment::create([
            'content' => $comment,
            'blog_post_id' => $post->id,
            'user_id' => auth()->id()
        ]);

        return back();
    }

    public function storeChildComment(CommentPostRequest $request, Comment $comment) {
        $commentContent = $request->validated()['comment'];

        Comment::create([
            'content' => $commentContent,
            'parent_id' => $comment->id,
            'user_id' => auth()->id()
        ]);

        return back();
    }

    public function update(CommentPostRequest $request, Comment $comment) {
        $commentContent = $request->validated()['comment'];

        $comment->update([
            'content' => $commentContent
        ]);

        return back();
    }

    public function destroy(Comment $comment) {
        $comment->delete();

        return back();
    }
}
