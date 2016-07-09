<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageRequest;
use App\Http\Requests\PhotoRequest;
use App\Message;
use App\Photo;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;

class MessagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index','show']]);
    }

    public function index()
    {
        $messages = Message::all();
        return view('messages.index', compact('messages'));
    }

    public function create()
    {
        return view('messages.create');
    }

    public function store(MessageRequest $request)
    {
        $message = Auth::user()->messages()->create($request->all());

        flash()->success();

        return redirect('/classifieds/messages/' . $message->id);
    }

    public function show($message)
    {
        return view('messages.show', compact('message'));
    }

    public function addPhoto($message, PhotoRequest $request)
    {
        $photo = Photo::fromFile($request->file('photo'));

        $message->addPhoto($photo);
    }


    public function destroyPhoto($id)
    {
        Photo::findOrFail($id)->delete();
        return redirect()->back();
    }

    public function destroy($message)
    {
        $message->delete();
        return redirect()->back();
    }

    public function edit($message)
    {
        return view('messages.edit', compact('message'));
    }

    public function update($message, MessageRequest $request)
    {
        $message->update($request->all());

        flash()->success();

        return redirect('/classifieds/messages/' . $message->id);
    }

}
