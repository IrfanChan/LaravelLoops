@extends('layouts.app',['title' => 'Website Post Sederhana'])

@section('content')

@auth
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endauth

@guest
<div class="container">
    <div class="row d-flex justify-content-center">
        @foreach ($post as $posts) 
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">{{ $posts->title }}</h5>
                      <hr>
                      <a href="{{ route('detail',$posts->slug) }}" class="btn btn-primary">Lihat Detail Posts</a>
                    </div>
                  </div>
            </div>
        @endforeach
    </div>
</div>  
@endguest

@endsection
