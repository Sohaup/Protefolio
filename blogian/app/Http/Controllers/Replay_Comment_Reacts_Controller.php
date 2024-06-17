<?php

namespace App\Http\Controllers;

use App\Models\Replay_Comment_React;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Replay_Comment_Reacts_Controller extends Controller
{
   public function reacts(Request $request) {
    if ($request['status'] == 'insert') {
        DB::delete('DELETE FROM replay_comment_reacts WHERE replay_comment_id = ?',[$request['replay_comment_id']]);
        $react =  new Replay_Comment_React();
        $react->value = $request['value'];
        $react->user_id = Auth::id();
        $react->post_id = $request['post_id'];
        $react->comment_id = $request['comment_id'];
        $react->replay_comment_id = $request['replay_comment_id'];
        $react->save();
        return "Success status ";
    }
    
   }
   public function delete_reacts(Request $request) {
    if ($request['status'] == "delete") {
        Replay_Comment_React::find($request['react_id'])->delete();
        return "Delete Successfuly";
    }
   }
}
