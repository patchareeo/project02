<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\PostComment;
use App\Models\Post;
use App\Models\Comment;


class CommentController extends Controller
{
    public function store(Request $request)
    {
        $comment = new Comment;

        $comment->comment = $request->comment;

        $comment->user()->associate($request->user());

        $post = Post::find($request->post_id);

        // dd($request->comment);
        // dd($request->post_id);
        // dd($post);


        $post->comments()->save($comment);   

        return back();
    }

    public function replyStore(Request $request)
    {
        $reply = new Comment();

        $reply->comment = $request->get('comment');

        $reply->user()->associate($request->user());

        $reply->parent_id = $request->get('comment_id');

        $post = Post::find($request->get('post_id'));

        $post->comments()->save($reply);

        return back();

    }

    public function destroy(Request $request, $id)
    {
        // dd($id);
        $Comments = Comment::where('id',$id);
        $Comments ->delete();
        // $order = orders::findOrFail($id);
        // $order->delete();
 
        return redirect()->back();
    }



}
