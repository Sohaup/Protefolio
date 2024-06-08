<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class Post_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = new Post();
        $postsData = $posts::all();
        if (Auth::check()) {
          $id = Auth::id();
          return view('blog' , ['posts'=>$postsData , 'user_id'=>$id]);  
        }
        return view('blog' , ['posts'=>$postsData]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('createPost');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
        'title'=>['required','string','max:50' , 'min:5'],
        'img'=>['required','file','mimes:jpg,jpeg,png'],
        'content'=>['required','string','max:3000']
       ]);
       $file = $request->file('img');
       if (move_uploaded_file($file->getPathname() , public_path('posts')."/".$file->getClientOriginalName())) {
        $post = new Post();
        $post->title = $request->input('title');
        $post->img = "/posts"."/".$file->getClientOriginalName();
        $post->content = $request['content'];
        $post->user_id = Auth::id();
        $post->save();
        return redirect()->route('postspath.index');
       } else {
       return "Failed To Publish The Post";
       }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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
