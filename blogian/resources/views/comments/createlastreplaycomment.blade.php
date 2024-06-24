@extends('main')


<div class="container w-75 bg-info position-absolute rounded-3  " @style(['left:15%','top:40%'])>
    <div class="row ">
       @if (isset($replay_user_id))
       <form action={{route('lastreplaycomments.store',[ 'replay_comment_id'=>$replay_comment_id , 'replay_user_id'=>$replay_user_id])}} method="POST">
       @else
       <form action={{route('lastreplaycomments.store',[ 'replay_comment_id'=>$replay_comment_id])}} method="POST">
       @endif
      
       
      
         @csrf
         
         <div class="col-12 ">       
             <label for="content" class="form-label h1 ">Replay on a Comment</label>
             <input name="content" type="text" class="form-control" />  
                
             @error('content')
                 <p class="text-danger text-center">{{$message}}</p>
             @enderror 
        </div>
         <div class="col-12 text-end ">
             <button type="submit" class="btn btn-dark mt-3">Replay</button>
         </div>
      </form>
    </div>
 </div>   