@extends('post.layout')
@section('title')
All Posts
@endsection
@section('content')
<div class="container">
  <div class="card" style="">
    <div class="card-body">
      <h5 class="card-title">Create Post</h5>
      <p class="card-text">
        @if (session()->has("success"))
            {{ session()->get("success") }}
         @endif
      </p>
      <a href="{{ url("post/create") }}" class="btn btn-primary">Create Post</a>
    </div>
  </div><br>
    <table class="table table-bordered border-primary">
        <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Title</th>
              <th scope="col">Author</th>
              <th scope="col">content</th>
              <th scope="col">Image</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($posts as $post)
            <tr>
              <th scope="row">{{ $post->id }}</th>
              <td>{{ $post->title }}</td>
              <td>{{ $post->author }}</td>
              <td>{{ $post->content }}</td>
              <td><img src="{{ asset("storage/$post->image") }}" width="100" height="100" alt="" srcset=""></td>
              <td>
                <div class="row">
                  <div class="col-sm">
                   <a href="{{ url("post/edit/$post->id") }}" class="btn btn-success">Edit</a>
                  </div>
                  <div class="col-sm">
                    <a href="{{ url("post/show/$post->id") }}" class="btn btn-info">Show</a>
                  </div>
                  <div class="col-sm">
                    <form action="{{ url("post/delete/$post->id") }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                  </div>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
      </table>
</div>
@endsection
