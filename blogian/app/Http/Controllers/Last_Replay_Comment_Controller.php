<?php

namespace App\Http\Controllers;

use App\Models\Last_Replay_Comment;
use App\Models\ReplayComments;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Last_Replay_Comment_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
      
        $replaycomment = ReplayComments::find($request['replay_comment_id']);
        if ($request['replay_user_id']) { 
            //$replay_user = User::find($request['replay_user_id']);
            return view('createlastreplaycomment' , ['replay_comment_id'=>$replaycomment->id , 'replay_user_id'=>$request['replay_user_id']]);               
            
        } else {
          return view('createlastreplaycomment' , ['replay_comment_id'=>$replaycomment->id]);
        }
      
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'content'=>['required','string','min:2','max:500']
        ]);
        $replaycomment  = ReplayComments::find($request['replay_comment_id']);

        $last_replay_comment = new Last_Replay_Comment();
        $last_replay_comment->content  = $request->input('content');
        $last_replay_comment->user_id = Auth::id();
        $last_replay_comment->post_id = $replaycomment->post_id;
        $last_replay_comment->comment_id = $replaycomment->comment_id;
        $last_replay_comment->replay_comment_id = $replaycomment->id;
        if ($request['replay_user_id'])  {
            $last_replay_comment->replay_user_id = $request['replay_user_id'];
        } else {
            $last_replay_comment->replay_user_id = $replaycomment->user_id;
        }
        $last_replay_comment->save();
        return redirect()->route('comments.index' , ['post_id'=>$replaycomment->post_id]);
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
       $last_replay_comment = Last_Replay_Comment::find($id); 
       return view('editlastreplaycomment',['lastreplaycomment'=>$last_replay_comment]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'content'=>['required','string','min:2','max:500']
        ]);
        $last_replay_comment = Last_Replay_Comment::find($id);
        $last_replay_comment->content = $request->input('content');
        $last_replay_comment->save();
        return redirect()->route('comments.index',['post_id'=>$last_replay_comment->post_id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $last_replay_comment = Last_Replay_Comment::find($id);
        $post_id = $last_replay_comment->post_id;
        $last_replay_comment->delete();
        return redirect()->route('comments.index',['post_id'=> $post_id]);
    }
}
