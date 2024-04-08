<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index()
    {
        $users = auth()->user();
        $posts = Post::all();
        return view('dashboard', ['posts' => $posts], compact('users'));
    }
}
