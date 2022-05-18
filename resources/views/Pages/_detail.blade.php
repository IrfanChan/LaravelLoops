@extends('layouts.app',['title' => $posts->title])

@section('content')

<div class="container">
   <div class="card mb-3">
       <div class="card-body">
        <h5 class="card-title">{{ $posts->title }}</h5>
        <span>Penulis : {{ $posts->user->name }} &middot; Publish {{ $posts->user->created_at }}</span>
        <hr>
        <span class="card-text">{!! $posts->content !!}</span>
        <hr>
        <h4>Display Comments {{  $total_comment }}</h4>
        @foreach($posts->comments as $comment)
            <div class="display-comment">
                <strong>{{ $comment->name }}</strong>
                <p>{{ $comment->comment }}</p>
            </div>
        @endforeach
        <hr />
        <h4>Add comment</h4>
        <form method="post" action="{{ route('store') }}">
            @csrf
            <form>
                <div class="mb-3">
                  <input type="text" class="form-control" name="name" placeholder="Name.." required>
                  <input type="hidden" class="form-control" name="post_id" value="{{ $posts->id }}">
                </div>
                <div class="mb-3">
                    <input type="email" class="form-control" name="email" placeholder="Email.." required>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" name="website" placeholder="Webiste.." required>
                </div>
                <div class="mb-3">
                   <textarea name="comment" id="" cols="30" rows="10" class="form-control" placeholder="Isi Komentar"></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-warning" value="Add Comment" />
                </div>
              </form>
        </form>
       </div>
   </div>
</div>
</div>  

@endsection
