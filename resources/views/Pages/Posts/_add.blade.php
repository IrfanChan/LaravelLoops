@extends('layouts.app',['title' => 'Add A New My Posts'])
@section('content')
<div class="container">
    <div class="mb-3">
      <a href="{{ route('posts.index') }}" class="btn btn-primary btn-sm border-0 shadow-sm">Back To Posts</a>
    </div>
      <div class="card">
          <div class="card-header">Add A New  My Posts</div>
          <div class="card-body">
            <form method="POST" action="{{ route('posts.save') }}">
              @csrf
                <div class="mb-3">
                  <label class="form-label">Title</label>
                  <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                  <x-validasi-error name="title"/>
                </div>

                <div class="mb-3">
                    <label class="form-label">Content</label>
                    <textarea name="content" id="content" cols="30" rows="10" class="form-control">{{ old('content') }}</textarea>
                    <x-validasi-error name="content"/>
                  </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
          </div>
      </div>
  </div>
@endsection

@push('js')
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace( 'content' );
</script>
@endpush