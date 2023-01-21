<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::all();
        return view('comment.index',["comments"=>$comments]);
    }
    public function show($id)
    {
       $comment = Comment::findOrFail($id);
        return view('comment.show',["comment"=>$comment]);
    }
    public function create()
    {
       $posts = Post::all();
        return view('comment.create',["posts"=>$posts]);
    }
    public function store(Request $request)
    {
        //validation
        $data = $request->validate([
          'comment'=>'required|string',
          'post_id'=>'required|numeric|exists:posts,id'
        ]);
        $data['user_id'] =1;
       // store
        Comment:: create ($data);
       session()->flash("success","comment is created successfully");
        //redirect
        return redirect(url("comments"));
    }
    public function edit($id)
    {
        $posts = Post::all();
        $comment = Comment::findOrFail($id);
        return view('comment.edit',["comment"=>$comment ,"posts"=>$posts]);
    }
    public function update(Request $request ,$id)
    {
        //validation
        $data = $request->validate([
            'comment'=>'required|string',
            'post_id'=>'required|numeric|exists:posts,id'
          ]);
         $comment = Comment::findOrFail($id);
         // store
          $comment->update($data);
         session()->flash("success","comment is Updated successfully");
          //redirect
          return redirect(url("comment/show/$comment->id"));
    }
    public function destroy($id)
    {
      $comment = Comment::findOrFail($id);
      $comment->delete();
      return redirect()->action([CommentController::class,'index']);
      session()->flash("success","comment is Deleted successfully");
    }
}

