@extends('layouts.app',['title' => 'Pages My Posts'])
@section('content')
<div class="container">
  @if(Session::has('msg'))
  <p class="alert alert-info mb-3">{{ Session::get('msg') }}</p>
  @endif
  <div class="mb-3">
    <a href="{{ route('posts.add') }}" class="btn btn-primary btn-sm border-0 shadow-sm">Add A New Posts</a>
  </div>
    <div class="card">
        <div class="card-header">Table My Posts</div>
        <div class="card-body">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Authors</th>
                    <th scope="col">Title</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Count Comments</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                @php
                $no = 1;
                @endphp
                @foreach ($post as $posts) 
                <tbody>
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $posts->user->name }}</td>
                        <td>{{ $posts->title }}</td>
                        <td>{{ $posts->slug }}</td>
                        <td>{{ $posts->comments_count }}</td>
                        <td></td>
                        <td>
                          <div class="d-flex justify-content-start">
                            <a href="{{ route('posts.edit',$posts->id) }}" class="btn btn-warning btn-sm border-0 shadow-sm me-2">Update</a>
                            <form action="{{ route('posts.delete',$posts->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm border-0 shadow-sm">Delete</button>
                            </form>
                          </div>
                        </td>
                    </tr>
                </tbody>
                @endforeach

              </table>
        </div>
    </div>
</div>
@endsection