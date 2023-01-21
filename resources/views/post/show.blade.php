@extends('post.layout')
@section('title')
All Posts
@endsection
@section('content')
<div class="container">
  @if (session()->has("success"))
       {{ session()->get("success") }}
  @endif
    <table class="table table-bordered border-primary">
        <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Title</th>
              <th scope="col">Author</th>
              <th scope="col">Content</th>
              <th scope="col">Image</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">{{ $post->id }}</th>
              <td>{{ $post->title }}
                <ul>
                @foreach ($post->comments as $comment)
                  <li>{{ $comment->comment }}</li>
                @endforeach
              </ul>
              </td>
              <td>{{ $post->author }}</td>
              <td>{{ $post->content }}</td>
              <td><img src="{{ asset("storage/$post->image") }}" width="100" height="100" alt="" srcset=""></td>
              <td>
                <div class="row">
                  <div class="col-sm">
                   <a href="{{ url("post/edit/$post->id") }}" class="btn btn-success">Edit</a>
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
          </tbody>
      </table>
      <div class="row">
        <div class="col-sm">
         <a href="{{ url('posts') }}" class="btn btn-success">ALL Posts</a>
        </div>
</div>
@endsection
