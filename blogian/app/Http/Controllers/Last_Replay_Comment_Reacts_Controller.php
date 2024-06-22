<?php

namespace App\Http\Controllers;

use App\Models\Last_Replay_Comment_React;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Last_Replay_Comment_Reacts_Controller extends Controller
{
    public function insert_react(Request $request) {
        if ($request['status'] == "insert") {
            DB::delete("DELETE FROM lastreplaycommentreacts WHERE last_replay_comment_id = ?" , [$request['last_replay_comment_id']]);
            $last_replay_comment_react = new Last_Replay_Comment_React();
            $last_replay_comment_react->value = $request['value'];
            $last_replay_comment_react->user_id = Auth::id();
            $last_replay_comment_react->post_id = $request['post_id'];
            $last_replay_comment_react->comment_id = $request['comment_id'];
            $last_replay_comment_react->replay_comment_id = $request['replay_comment_id'];
            $last_replay_comment_react->last_replay_comment_id = $request['last_replay_comment_id'];
            $last_replay_comment_react->save();
            return "Success Insert React" ;
        }
    }

    
    public function delete_react(Request $request) {
        if ($request['status'] == "delete") {
            $last_replay_comment_react = Last_Replay_Comment_React::find($request['react_id'])->delete();
            return "Deleted Successfuly";
        }
    }
} 
