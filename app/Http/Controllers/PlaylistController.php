<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(10);
        return view('playlist', compact('posts'));
    }

    public function add(Request $request){
    $posts = Post::find($request->id);
       Cart::add(
           $posts->id,
           $posts->title,
           $posts->foto,
           $posts->fecha,
           $posts->genero,
           $posts->artista,
           $posts->cancion
       );
       return redirect('playlist');
    }
    
}
