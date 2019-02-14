<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\Mail\CommentReceived;

class CommentsController extends Controller
{
    public function store($postId)
    {
        $post = Post::find($postId);

        $this->validate(request(), Comment::STORE_RULES);

        $comment = $post->comments()->create(request()->all());

        if ($post->user) {
            \Mail::to($post->user)->send(new CommentReceived(
                $post, $comment
            ));
        }

        return redirect()->route('single-post', ['id' => $postId]);
    }
}
