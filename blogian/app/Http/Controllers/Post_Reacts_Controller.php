<?php

namespace App\Http\Controllers;

use App\Models\Post_Reacts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Post_Reacts_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
       $react_container = []; 
      if ($request['status'] == 'insert') {    
       $reacts = Post_Reacts::all();
       DB::delete("DELETE FROM postreacts Where post_id = ?" , [$request['post_id']]);
       $postreact = new Post_Reacts();
       $postreact->type = "";
       $postreact->user_id = Auth::id();
       $postreact->post_id = $request['post_id'];
       $postreact->value = $request['value']; 
       $postreact->save();
      
       
       return "Successfuly created post react" ;
      } else if ($request['status'] == 'delete') {
        if ($request['react_id']) {
            $react = Post_Reacts::find($request['react_id'])->delete();
            return "deleted Successfuly ";
        }
        
      }
       
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {        
       /*$postreact = new Post_Reacts();
       $postreact->type = "";
       $postreact->user_id = Auth::id();
       $postreact->post_id = $request['post_id'];
       $postreact->value = $request['value']; 
       $postreact->save();*/
       return  " Success Creating React";
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
