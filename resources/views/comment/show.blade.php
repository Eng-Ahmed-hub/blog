@extends('comment.layout')
@section('title')
All Comments
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
              <th scope="col">comment</th>
              <th scope="col">post_id</th>
              <th scope="col">user_id</th>
              <th scope="col">created_at</th>
              <th scope="col">updated_at</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">{{ $comment->id }}</th>
              <td>{{ $comment->comment }} - Post {{ $comment->post->title }}</td>
              <td>{{ $comment->post_id }}</td>
              <td>{{ $comment->user_id }}</td>
              <td>{{ $comment->created_at }}</td>
              <td>{{ $comment->updated_at }}</td>
              {{-- <td><img src="{{ asset("storage/$post->image") }}" width="100" height="100" alt="" srcset=""></td> --}}
              <td>
                <div class="row">
                  <div class="col-sm">
                   <a href="{{ url("comment/edit/$comment->id") }}" class="btn btn-success">Edit</a>
                  </div>
                  <div class="col-sm">
                    <form action="{{ url("comment/delete/$comment->id") }}" method="post">
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
         <a href="{{ url('comments') }}" class="btn btn-success">ALL Comments</a>
        </div>
</div>
@endsection
