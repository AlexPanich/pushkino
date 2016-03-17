<?php

namespace App\Http\Controllers;

use App\Article;
use App\Message;
use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller
{
    public function index()
    {
        return view('pages.home');
    }

    public function news()
    {
        $articles = Article::published()->fresh()->get();
        return view('pages.news', compact('articles'));
    }

    public function classifieds()
    {
        $messages = Message::latest()->fresh()->get();
        return view('pages.classifieds', compact('messages'));
    }
}
