<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class FavoriteController extends Controller
{
    public function store(Request $request, $id)
    {
        \Auth::user()->favorite($id);
        return redirect()->back();
    }

    public function destroy($id)
    {
        \Auth::user()->unfavorite($id);
        return redirect()->back();
    } 
    
    public function index($id)
    {   
        $user = User::find($id);
        $posts = $user->favoritings()->orderBy('created_at', 'desc')->paginate(16);

        $data = [
                'user' => $user,
                'posts' => $posts,
        ];
    
        return view('favorite.index', $data);
    }
    
}
