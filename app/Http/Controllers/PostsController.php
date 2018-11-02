<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Post;

use Storage;

class PostsController extends Controller
{
    public function list()
    {   
        $posts = Post::orderBy('created_at', 'desc')->paginate(16);
        
        
        
        return view('posts.list', [
           'posts' =>  $posts,
        ]);
        
    }
    
    public function index()
    {
        return view('welcome');

    }
    
    public function create()
    {
        return view('posts.create');
    }

    public function destroy()
    {
        

    }

    public function show()
    {

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|image',
            'content' => 'required|max:191',
        ]);
        
        $image = $request->file('file');
        $image_path = Storage::disk('s3')->putFile($image->hashName(), $image, 'public');
        $url = Storage::disk('s3')->url($image_path);

        $request->user()->posts()->create([
            'content' => $request->content,
            'image_path' => $image_path,
        ]);
        
        return redirect()->back()->with('s3url', $url);
    }   
}
        