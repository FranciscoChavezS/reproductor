<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('video', compact('users'));
    }

    
}
