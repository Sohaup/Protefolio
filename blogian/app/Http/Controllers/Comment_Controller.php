<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\countOf;

class Comment_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    { 
        $post_id = $request['post_id'];
        $comments = Comment::all();   
        $users = User::all();  
      

        
        if (Auth::check()) {
          $id = Auth::id();
         return view('comments',['post_id'=>$post_id , 'comments'=>$comments , 'users'=>$users  ,'bool'=>true,'user_id' =>$id ]);      
                 
        } else {
           return view('comments',['post_id'=>$post_id , 'comments'=>$comments , 'users'=>$users ,'bool'=>false ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'content'=>['required','string','min:2','max:500']
        ]);       
        $post_id = $request['post_id'];
        $comment = new Comment();
        $comment->content = $request->input('content');
        $comment->user_id = Auth::id();
        $comment->post_id = $post_id;
        $comment->save();
        return redirect()->route('comments.index',['post_id'=>$post_id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $comment = Comment::find($id);
        return view('editComment',['comment'=>$comment]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'content'=>['required','string','max:500','min:2']
        ]);
        $comment = Comment::find($id);
        $comment->content = $request->input('content');
        $comment->save();
        return redirect()->route('comments.index',['post_id'=>$comment->post->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comment = Comment::find($id);
        $post_id = $comment->post->id;
        $comment->delete();
        return redirect()->route('comments.index',['post_id'=>$post_id]);
    }
}
