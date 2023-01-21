@extends('comment.layout')
@section('content')
<div class="container">
  <div class="card" style="">
    <div class="card-body">
      <h5 class="card-title">Create Comment</h5>
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      <a href="{{ url("comments") }}" class="btn btn-primary">Create Comment</a>
    </div>
  </div>
  {{-- @if ($errors->any())
     @foreach ($errors->all() as $error)
          {{ $error }}
     @endforeach
  @endif --}}
<form action="{{ url("comment") }}" method="post">
  @csrf
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">comment</label>
    <input type="text" class="form-control"name="comment" value="{{ old('comment') }}" id="exampleFormControlInput1" placeholder="">
    @error('comment')
        {{ $message }}
    @enderror
  </div>
  <select class="form-select" name="post_id" aria-label="Default select example">
      <option selected>Select Post</option>
    @foreach ($posts as $post)
    <option value="{{ $post->id }}">{{ $post->title }}</option>

    @endforeach
  </select><br>
  {{-- <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">post_id</label>
    <input type="text" class="form-control"name="post_id" value="{{ old('post_id') }}" id="exampleFormControlInput1" placeholder="">
    @error('post_id')
    {{ $message }}
    @enderror
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">user_id</label>
    <input type="text" class="form-control"name="user_id" value="{{ old('user_id') }}" id="exampleFormControlInput1" placeholder="">
    @error('user_id')
    {{ $message }}
    @enderror
  </div> --}}
  {{-- <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Image</label>
    <input type="file" class="form-control"name="image" {{ old('image') }} id="exampleFormControlInput1" placeholder="">
    @error('image')
    {{ $message }}
    @enderror
  </div> --}}
  {{-- <div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">user_id</label>
    <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="3">{{ old('content') }}</textarea>
    @error('content')
    {{ $message }}
    @enderror
  </div> --}}
  <div>
  <button type="submit" class="btn btn-primary">Send</button>
 </div>
</form>
</div>
@endsection
@section('title')
Create Comment
@endsection
