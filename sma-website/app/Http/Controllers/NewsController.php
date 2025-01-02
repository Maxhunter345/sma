<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::orderBy('created_at', 'desc')->get();
        return view('enews', compact('news'));
    }

    public function show(News $news)
    {
        return view('berita.show', compact('news'));
    }
}