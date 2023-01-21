@extends('comment.layout')
@section('content')
<div class="container">
  <div class="card" style="">
    <div class="card-body">
      <h5 class="card-title">Update Comment</h5>
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      <a href="{{ url('comments') }}" class="btn btn-primary">All Comment</a>
    </div>
  </div>
  {{-- @if ($errors->any())
     @foreach ($errors->all() as $error)
          {{ $error }}
     @endforeach
  @endif --}}
<form action="{{ url("comment/update/$comment->id") }}" method="post" enctype="multipart/form-data">
  @csrf
  @method('PUT')
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Comment</label>
    <input type="text" class="form-control"name="comment" value="{{ $comment->comment }}" id="exampleFormControlInput1" placeholder="">
    @error('comment')
        {{ $message }}
    @enderror
  </div>
  <select class="form-select" name="post_id" aria-label="Default select example">
    {{-- <option selected>Select Post</option> --}}
  <option value="{{ $comment->post->id }}">{{$comment->post->title }}</option>
  @foreach ($posts as $post)
  <option value="{{ $post->id }}">{{ $post->title }}</option>

  @endforeach
</select><br>
  {{-- <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Author</label>
    <input type="text" class="form-control"name="author" value="{{ $post->author }}" id="exampleFormControlInput1" placeholder="">
    @error('author')
    {{ $message }}
    @enderror
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Image</label>
    <input type="file" class="form-control"name="image" value="{{ $post->image }}" id="exampleFormControlInput1" placeholder=""><br>
    <img src="{{ asset("storage/$post->image") }}" width="100" height="100" alt="" srcset="">
    @error('image')
    {{ $message }}
    @enderror
  </div>
  <div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">Content</label>
    <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="3">{{ $post->content }}</textarea>
    @error('content')
    {{ $message }}
    @enderror
  </div> --}}
  <div>
  <button type="submit" class="btn btn-primary">update</button>
 </div>
</form>
</div>
@endsection
@section('title')
Create Post
@endsection
