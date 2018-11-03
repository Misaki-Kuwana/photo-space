<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\post;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        
        return view('users.index', [
            'users' => $users,
        ]);
    }
    
    public function show($id)
    {
        $user = User::find($id);
        $posts = $user->posts()->orderBy('created_at', 'desc')->paginate(16);
        
        $data = [
            'user' => $user,
            'posts' => $posts,
        ];
        
        return view('users.show', $data);
    }  
    
    public function followings($id)
    {
        $user = User::find($id);
        $followings = $user->followings()->paginate(10);
        
        $data = [
            'user' => $user,
            'users' => $followings,    
        ];
        
        return view('users.followings', $data);
    }
    
    public function followers($id)
    {
        $user = User::find($id);
        $followers = $user->followers()->paginate(10);
        
        $data = [
            'user' => $user,
            'users' => $followers,    
        ];
        
        return view('users.followers', $data);
    }   
    
    
}
 