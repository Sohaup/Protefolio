<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\ReplayComments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Replay_Comments_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if ( $request['comment_id']) {
        $comment_id = $request['comment_id'];
        $comment = Comment::find($comment_id);
        $post_id = $comment->post->id;
        return view('comments/createreplaycomment',['comment_id' => $comment_id , 'post_id'=>$post_id]);       
    }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'content'=>['required','string','min:2' ,'max:500']
        ]);
        $replay_comment = new ReplayComments();
        $replay_comment->content = $request->input('content');
        $replay_comment->user_id = Auth::id();
        $replay_comment->post_id = $request['post_id'];
        $replay_comment->comment_id = $request['comment_id'];
        $replay_comment->save();
        return redirect()->route('comments.index' , ['post_id'=>$request['post_id']  ]);
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
        
        $replaycomment = ReplayComments::find($id); 
        return view('comments/editreplaycomment' , ['replaycomment'=>$replaycomment]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'content'=>['required' , 'string' , 'min:2' ,'max:500']
        ]);
        $replaycomment = ReplayComments::find($id);
        $replaycomment->content = $request->input('content');
        $replaycomment->save();
        return redirect()->route('comments.index',['post_id'=>$replaycomment->post->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $replaycomment = ReplayComments::find($id);
        $post_id = $replaycomment->post->id;
        $replaycomment->delete();
        return redirect()->route('comments.index' , ['post_id'=>$post_id]);
    }
}
