<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts=News::where('user_id', auth()->user()->id)->limit(3)->get();
        return view('home', compact('posts'));
    }
}
