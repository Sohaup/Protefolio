<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\avatar;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Inertia\Inertia;

class avatar_controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("avatars/createAvatar");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $id = Auth::id();
        $user = User::find($id);
        $avatar = $user->avatar;
        return View('avatars/deleteAvatar',['avatar'=>$avatar]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $id = Auth::id();
        $user =  User::find($id);
        $request->validate([
            'avatar'=>['required' , 'file' , 'mimes:jpg,jpeg,png']
        ]);
        $file = $request->file('avatar');
        $path = Str::slug( $file->getClientOriginalName()).".".$file->getClientOriginalExtension() ;
        if (move_uploaded_file($file->getPathname() , public_path('avatars')."/".$path)) {
            $avatar = new avatar();
            $avatar->path = "/avatars".'/'.$path;
            $avatar->user_id = $id;
            $avatar->save();
            return  redirect()->route('dashboard');
        } else  {
            return "Failed to Load File To Data Base";
        }
      
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
        $avatar = avatar::find($id);
        
        return view('avatars/editAvatar',['id'=>$id , 'avatar'=>$avatar]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'avatar'=>['required','file','mimes:jpg,jpeg,png']
        ]);
        $file = $request->file('avatar');
        $path = Str::slug($file->getClientOriginalName()).$file->getClientOriginalExtension();
        if (move_uploaded_file($file->getPathname() , public_path('avatars')."/".$path)) {
        $avatar = avatar::find($id);
        $avatar->path = "/avatars"."/".$path;            
        $avatar->save();
        return redirect()->route('dashboard');
        } else {
            return "Failed To Update Avatar";
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        $avatar = avatar::find($id);
       
        if (unlink(public_path($avatar->path))) {            
            avatar::find($id)->delete();
            return redirect()->route('dashboard');
        } else {
            return  "Failed TO Delete Avatar";
        }
        
    }
}
