<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use Auth;
class NewsController extends Controller
{
    public function index()
    {
        $arrNews = News::where('user_id', Auth::user()->id)->get();
        return view('news.index', compact('arrNews'));
    }
    public function add()
    {
        return view('news.addNews');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' =>'required',
            'description' => 'required',
            'imageNews' => 'required|mimes:jpeg,jpg,bmp,png'
        ]);
        $imageNews = $request->imageNews;
        $imageName = rand(3000,999999).$imageNews->getClientOriginalName();
        $destinationPath = public_path().'/img/news/';
        $imageNews->move($destinationPath,$imageName);
            
        $newsAdd = New News;
        $newsAdd->title = $request->title; 
        $newsAdd->image = $imageName; 
        $newsAdd->description = $request->description; 
        $newsAdd->user_id = Auth::user()->id; 
        $newsAdd->save(); 
        
        return redirect()->route('allNews')->with('msg', 'News Success Added');
    }

    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('news.editNews', compact('news'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' =>'required',
            'description' => 'required',
            'imageNews' => 'mimes:jpeg,bmp,png'
        ]);
        $newsEdit = News::findOrFail($id);
        if($request->has('imageNews')){
            $oldImage = public_path().'/img/news/'.$newsEdit->image;
            unlink($oldImage);
            $newImageNews = $request->imageNews;
            $imageName = rand(3000,999999).$newImageNews->getClientOriginalName();
            $destinationPath = public_path().'/img/news/';
            $newImageNews->move($destinationPath,$imageName);
            $newsEdit->image = $imageName; 
        }

        $newsEdit->title = $request->title; 
        $newsEdit->description = $request->description; 
        $newsEdit->user_id = Auth::user()->id; 
        $newsEdit->save(); 
        
        return redirect()->route('allNews')->with('msg', 'News Success Updated');
    }

    public function delete($id)
    {
        $newsDelete = News::findOrFail($id);
        $newsDelete->delete(); 
        
        return redirect()->back()->with('msg', 'News Success Updated');
    }
}
