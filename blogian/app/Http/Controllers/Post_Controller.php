<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\Post;
use App\Models\Post_Reacts;
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
        //$posts = new Post();
        $postsData = Post::all();
        $postreacts = Post_Reacts::all();
        //dd($postreacts);
        if (Auth::check()) {
          $user = Auth::user();
          return view('posts/blog' , ['posts'=>$postsData ,'bool'=>true ,'user'=>$user , 'postreacts'=>$postreacts]);  
        } else {
        return view('posts/blog' , ['posts'=>$postsData , 'bool'=>false , 'postreacts'=>$postreacts]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts/createPost');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
        'title'=>['required','string','max:50' , 'min:2'],
        'img'=>['required','file','mimes:jpg,jpeg,png,gif'],
        'content'=>['required','string','max:3000']
       ]);
       $file = $request->file('img');
       $path = Str::slug($file->getClientOriginalName()).".".$file->getClientOriginalExtension();
       if (move_uploaded_file($file->getPathname() , public_path('posts')."/".$path)) {
        $post = new Post();
        $post->title = $request->input('title');
        $post->img = "/posts"."/".$path;
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
        $post = Post::find($id);

        return view('posts/editPost',['post'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title'=>['required','string', 'min:2','max:50'],
            'img'=>['required','file','mimes:jpg,jpeg,png,gif'],
            'content'=>['required','string','max:3000']
           ]);
           $file = $request->file('img');
           $path = Str::slug($file->getClientOriginalName()).".".$file->getClientOriginalExtension();
           if (move_uploaded_file($file->getPathname() , public_path('posts')."/".$path)) {
            $post = Post::find($id);
            $post->title = $request->input('title');
            $post->img = "/posts"."/".$path;
            $post->content = $request['content'];            
            $post->save();
            return redirect()->route('postspath.index');
           } else {
           return "Failed To Publish The Post";
           }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);
        if (unlink(public_path($post->img))) {
            $post->delete();
            return redirect()->route('postspath.index');
        } else {
            return "Failed To Delete Post";
        }
      
    }
}
