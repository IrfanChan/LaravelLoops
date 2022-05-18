<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  
    public function index()
    {
        $post = Post::get();
        return view('Pages._home',compact('post'));
    }

    public function detail(Post $posts)
    {
        $posts_koment = Post::withCount('comments')->where(['slug' => $posts->slug])->get();
        $total_comment = $posts_koment->sum('comments_count');
        
        return view('Pages._detail',compact('posts','total_comment'));
    }

    public function store(Request $request)
    {
        $comment = new Comment();
        $comment->comment = $request->comment;
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->website = $request->website;
        $post = Post::find($request->get('post_id'));
        $post->comments()->save($comment);
        return back();
    }
}
