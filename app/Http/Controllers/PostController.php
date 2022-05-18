<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $post = Post::withCount('comments')->get();

        return view('Pages.Posts._index',compact('post'));
    }

    public function add()
    {
        return view('Pages.Posts._add');
    }

    public function created(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
        
        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        if($post){
            return redirect()->route('posts.index')->with('msg','Data posts berhasil ditambahkan');
        } else {
            return back()->withInput()->with('msg','Oops ada terjadi kesalahan!');
        }
    }

    public function edit(Post $posts)
    {
        return view('Pages.Posts._update',compact('posts'));
    }

    public function update(Request $request, Post $posts)
    {
        $request->validate([
            'title' => 'required|unique:posts,title,' . $posts->id,
            'content' => 'required',
        ]);
        
        $posts->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        if($posts){
            return redirect()->route('posts.index')->with('msg','Data posts berhasil terupdate');
        } else {
            return back()->withInput()->with('msg','Oops ada terjadi kesalahan!');
        }
    }

    public function delete(Post $posts)
    {
        $posts->delete();
        if($posts){
            return redirect()->route('posts.index')->with('msg','Data posts berhasil terhapus');
        } else {
            return back()->withInput()->with('msg','Oops ada terjadi kesalahan!');
        }
    }

}
