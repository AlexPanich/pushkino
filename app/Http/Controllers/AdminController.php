<?php

namespace App\Http\Controllers;

use App\Article;
use App\Message;
use Gate;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        if (Gate::denies('view_admin')) {
            abort(404);
        }
        $articles = Article::all();
        $messages = Message::all();
        return view('admin.index', compact('articles', 'messages'));
    }
}
