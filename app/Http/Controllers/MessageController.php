<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateMessageRequest;
use App\Message;

class MessageController extends Controller
{
    public function show(Message $message){
        return view('messages.show', [
            'message' => $message,
        ]);
    }
    public function create(CreateMessageRequest $request){
        
        $user = $request->user();
        $image = $request->file('image');
      
        $message = Message::create([
            'user_id'=>$user->id,
            'description'=>$request->input('message'),
            'image' => $image->store('messages', 'public'),
        ]);
        return redirect('/messages/'.$message->id);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        //$messages = Message::with('user')->where('description', 'LIKE', "%$query%")->get();
        $messages = Message::search($query)->get();
        $messages->load('user');
        return view('messages.index', ['messages' => $messages]);
    }

    public function responses(Message $message)
    {
        return $message->responses;
    }
}

