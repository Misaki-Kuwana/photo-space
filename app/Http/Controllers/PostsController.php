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
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $posts = $user->feed_posts()->orderBy('created_at', 'desc')->paginate(16);
            
            $data = [
                'user' => $user,
                'posts' => $posts,
            ];
        }
        return view('welcome', $data);
    }
    
    public function create()
    {
        return view('posts.create');
    }

    public function destroy($id)
    {
        $post = \App\Post::find($id);
        
        if (\Auth::id() === $post->user_id) {
            $post->delete();
        }
        
        return redirect('/');
    }

    public function show($id)
    {
        $post = Post::find($id);
        
        return view('posts.show', [
           'post' =>  $post,
        ]);        
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
        