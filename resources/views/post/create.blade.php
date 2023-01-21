@extends('post.layout')
@section('content')
<div class="container">
  <div class="card" style="">
    <div class="card-body">
      <h5 class="card-title">Create Post</h5>
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      <a href="{{ url("posts") }}" class="btn btn-primary">Create Post</a>
    </div>
  </div>
  {{-- @if ($errors->any())
     @foreach ($errors->all() as $error)
          {{ $error }}
     @endforeach
  @endif --}}
<form action="{{ url("post") }}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Title</label>
    <input type="text" class="form-control"name="title" value="{{ old('title') }}" id="exampleFormControlInput1" placeholder="">
    @error('title')
        {{ $message }}
    @enderror
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Author</label>
    <input type="text" class="form-control"name="author" value="{{ old('author') }}" id="exampleFormControlInput1" placeholder="">
    @error('author')
    {{ $message }}
    @enderror
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Image</label>
    <input type="file" class="form-control"name="image" {{ old('image') }} id="exampleFormControlInput1" placeholder="">
    @error('image')
    {{ $message }}
    @enderror
  </div>
  <div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">Content</label>
    <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="3">{{ old('content') }}</textarea>
    @error('content')
    {{ $message }}
    @enderror
  </div>
  <div>
  <button type="submit" class="btn btn-primary">Send</button>
 </div>
</form>
</div>
@endsection
@section('title')
Create Post
@endsection
