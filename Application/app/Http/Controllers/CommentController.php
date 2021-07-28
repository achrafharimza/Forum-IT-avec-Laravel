<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Sujet;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|min:5',    
        ]);
  
        Comment::create([
       'content' => $request->content,
        'user_id' => auth()->user()->id,
        'sujet_id' => $request->id,
                    ]);
       

        return back();
    }
// public function commentsforsujet()
//     {
//         $sujets = Sujet::all()->where('user_id', auth()->user()->id);
//         // $sujets = auth()->user()->sts();
//         return view('sujets.sujet', compact('sujets'));
//     }
   
}
