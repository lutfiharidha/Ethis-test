<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;

class IndexController extends Controller
{
    public function index()
    {
        $arrNews = News::paginate(9);

        return view('welcome', compact('arrNews'));
    }
}
