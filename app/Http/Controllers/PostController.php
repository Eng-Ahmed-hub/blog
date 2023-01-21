<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {

      $posts = Post::all();
      return view('post.index',["posts"=>$posts]);
    }
    public function show($id)
    {
      $post = Post::findOrFail($id);
      return view('post.show',["post"=>$post]);
    }
    public function create()
    {
      return view('post.create');
    }
    public function store(Request $request)
    {
       //validation
      $data = $request->validate([
        'title'=>'required|string',
        'author'=>'required|string',
        'image'=>'required|image|mimes:png,jpg,PNG,webp',
        'content'=>'required|string'
       ]);
       //store
       $data['image'] = Storage::putFile("posts",$data['image']);
       Post::create($data);
       session()->flash("success",'post is inserted successfully');
       //redirect
       return redirect(url('posts'));
    }

    public function edit($id)
    {
      $post = Post::findOrFail($id);
      return view('post.edit',["post"=>$post]);
    }
    public function update(Request $request , $id)
    {
        //validation
        $data = $request->validate([
          'title'=>'required|string',
          'author'=>'required|string',
          'image'=>'required|image|mimes:png,jpg,PNG,webp',
          'content'=>'required|string'
         ]);
         //update
         $post = Post::findOrFail($id);
         if ($request->has('image')) {
                Storage::delete($post->image);
                $data['image'] = Storage::putFile("posts",$data['image']);
         }
         $post->update($data);
         session()->flash("success","Pot is updated successfully");
        //redirect
        return redirect(url("post/show/$post->id"));
    }
    public function destroy($id)
    {
      $post = Post::findOrFail($id);
      $post->delete();
      Storage::delete($post->image);
      return redirect()->action([PostController::class,'index']);
    }

}
