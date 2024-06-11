@extends('main')

<div class="container w-75 bg-info position-absolute rounded-3  " @style(['left:15%','top:40%'])>
    <div class="row ">
       <form action={{route('comments.update',[$comment->id])}} method="POST">
         @csrf
         @method('PUT')
         <div class="col-12 ">       
             <label for="content" class="form-label h1 ">edit a Comment</label>
             <input name="content" type="text" class="form-control" value="{{$comment->content}}"/>  
                
             @error('content')
                 <p class="text-danger text-center">{{$message}}</p>
             @enderror 
        </div>
         <div class="col-12 text-end ">
             <button type="submit" class="btn btn-success mt-3">Edit</button>
         </div>
      </form>
    </div>
 </div>   