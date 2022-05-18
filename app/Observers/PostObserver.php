<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Str;

class PostObserver
{
   
    public function saving(Post $post)
    {
        $post->slug = Str::slug($post->title);
        $post->user_id = auth()->user()->id;
    }

    public function deleting(Post $post)
    {
        $post->comments()->delete();
    }

}
