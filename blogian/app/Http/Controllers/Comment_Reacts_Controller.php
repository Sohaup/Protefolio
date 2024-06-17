<?php

namespace App\Http\Controllers;

use App\Models\Comment_React;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Comment_Reacts_Controller extends Controller
{
    public function comment_reacts(Request $request) {
        if ($request['status'] == 'insert') { 
            DB::delete("DELETE FROM commentreacts Where comment_id = ?" , [$request['comment_id']]);           
            $comment_react = new Comment_React();
            $comment_react->value = $request['value'];
            $comment_react->user_id = Auth::id();
            $comment_react->post_id = $request['post_id'];
            $comment_react->comment_id = $request['comment_id'];
            $comment_react->save();
            return "Response Success post_id : ".$request['post_id']."status : ".$request['status']." value: ".$request['value']."comment_id :".$request['comment_id'];
        } /*else if ($request['status'] == 'delete') {
            if ($request['react_id']) {
                $react = Comment_React::find($request['react_id'])->delete();
                return "deleted Successfuly ".$request['react_id'];
            }
            
          }*/
 
    }
    public function delete_comment_reacts(Request $request) {
        if ($request['status'] == 'delete') {
            if ($request['react_id']) {
                $react = Comment_React::find($request['react_id'])->delete();
                return "deleted Successfuly ".$request['react_id'];
            }
            
          }
    }
}
