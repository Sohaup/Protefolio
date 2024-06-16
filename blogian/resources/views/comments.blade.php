@extends('main')
@php
  function Find_Comment_React($id , $arr , $val , $user_id , $comment_id) {
   
    foreach ($arr as $index => $commentreact) {
       if ($commentreact->post_id == $id && $user_id == $commentreact->user_id && $commentreact->comment_id == $comment_id) {            
        return $commentreact->$val;
        break;
       }
    }
  }

  
@endphp
<div class="container  ">
    <main>
        <div class="row ">
            <div class="col-12 ">
                <section class="d-flex flex-column gap-3 w-100 position-absolute comment" @style(['max-height:600px','overflow-y:auto','right:0%']) role={{$post_id}}>
                    
                    @forelse ($comments as $comment)     
                          
                      @if ($comment->post_id == $post_id)
                      <div class="d-flex flex-column gap-1">
                          <div class="d-flex flex-row gap-5">    
                            @if ($comment->user->avatar)
                            <img src={{$comment->user->avatar->path}} class="img-fluid rounded-circle" width="50px" height="50px"/>
                            @else 
                            <img src="/imgs/human.png" class="img-thumbnail rounded-circle" width="50px" height="50px"/>  
                            @endif                    
                           
                            
                           
                           
                                                               
                          </div>
                          <div class="rounded-4 d-flex flex-column me-2"  @style(['background-color:lightgray' ,'height:auto','max-height:300'])>
                              <p class="ps-2 " @style(['font-size:15px'])>{{$comment->content}}</p>                             
                              <p class="justify-content-center d-flex flex-row gap-2" @style(['font-size:12px'])><span>Created By : <span @style(['color:crimson'])>{{$comment->user->name}}</span></span> <span> Created At : <span @style(['color:midnightblue'])>{{$comment->created_at}}</span></span></p>
                             
                              
                             
                          </div>
                          <form action="comments/{{$comment->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                          <div class="d-flex flex-row gap-5 justify-content-around">
                                 
                              @if ($bool)
                              <a class="text-dark  " @style(['font-size:19px','text-decoration:none']) href={{route('replaycomments.create',['comment_id'=>$comment->id])}} >Replay</a>
                                  <select class="form-select text-warning comment_react" @style(['width:100px' , 'background-color:transparent','border:none','font-size:19px']) id={{$comment->id}} role={{Find_Comment_React($post_id , $commentreacts , 'id' , $user_id , $comment->id)}} >
                                    @if (Find_Comment_React($post_id , $commentreacts , 'value' , $user_id , $comment->id))
                                    <option selected class="text-warning m-0">{{Find_Comment_React($post_id , $commentreacts , 'value' , $user_id , $comment->id)}}</option>
                                    @else
                                    <option selected class="text-warning m-0">React</option>
                                    @endif
                                    <option>&#128151</option>
                                    <option>&#128525</option>
                                    <option>&#X1F44D</option>
                                    <option>&#128514</option>
                                    <option>&#128549</option>
                                    <option>&#128531</option>
                                    <option class="text-danger trash" >Delete</option>                                    
                                  </select> 
                              
                              @if ($comment->user_id == $user_id)
                                  <a class="text-success " @style(['font-size:19px','text-decoration:none',]) href={{route('comments.edit',$comment->id)}}>Edit</a>
                                  <input class="text-danger" @style(['font-size:19px','text-decoration:none','background-color:transparent','border:none',]) value="Delete" type="submit" />
                              @endif
                              @endif
                         </div>
                        </form>
                      </div>
                     

                     
                   
                      
                      @endif
                     @foreach ($replaycomments as $replaycomment)
                  
                     @if ($replaycomment->post_id == $post_id && $replaycomment->comment_id == $comment->id)
                     <div class="d-flex flex-column gap-1">
                        <div class="d-flex flex-row gap-5">    
                          @if ($replaycomment->user->avatar)
                          <img src={{$replaycomment->user->avatar->path}} class="img-fluid rounded-circle" width="50px" height="50px"/>
                          @else 
                          <img src="/imgs/human.png" class="img-thumbnail rounded-circle" width="50px" height="50px"/>  
                          @endif                    
                         
                          
                         
                         
                                                             
                        </div>
                        <div class="rounded-4 d-flex flex-column me-2"  @style(['background-color:darkgray' ,'height:auto','max-height:300'])>
                            <p class="ps-2 " @style(['font-size:15px'])><span @style(['color:midnightblue'])> {{$comment->user->name}}</span> {{$replaycomment->content}}</p>                             
                            <p class="justify-content-center d-flex flex-row gap-2" @style(['font-size:12px'])><span>Created By : <span @style(['color:crimson'])>{{$replaycomment->user->name}}</span></span> <span> Created At : <span @style(['color:midnightblue'])>{{$replaycomment->created_at}}</span></span></p>
                           
                            
                           
                        </div>
                        <form action="replaycomments/{{$replaycomment->id}}" method="POST">
                          @csrf
                          @method('DELETE')
                        <div class="d-flex flex-row gap-5 justify-content-around">
                               
                            @if ($bool)                               
                               <a class="text-dark replay  " @style(['font-size:19px','text-decoration:none']) href={{route('lastreplaycomments.create',['replay_comment_id'=>$replaycomment->id])}}  >Replay</a>                              
                          
                                <a class="text-warning" @style(['font-size:19px','text-decoration:none'])>React</a>
                            
                            @if ($replaycomment->user_id == $user_id)
                                <a class="text-success " @style(['font-size:19px','text-decoration:none']) href={{route('replaycomments.edit',$replaycomment->id)}} >Edit</a>
                                <input class="text-danger" @style(['font-size:19px','text-decoration:none','background-color:transparent','border:none']) value="Delete" type="submit" />
                            @endif
                            @endif
                       </div>
                      </form>
                    </div>
                       
                  
                     @endif
                       @foreach ($lastreplaycomments as $lastreplaycomment)
                           @if ($lastreplaycomment->post_id == $post_id && $comment->id == $lastreplaycomment->comment_id && $lastreplaycomment->replay_comment_id == $replaycomment->id)
                           <div class="d-flex flex-column gap-1">
                            <div class="d-flex flex-row gap-5">    
                              @if ($lastreplaycomment->user->avatar)
                              <img src={{$lastreplaycomment->user->avatar->path}} class="img-fluid rounded-circle" width="50px" height="50px"/>
                              @else 
                              <img src="/imgs/human.png" class="img-thumbnail rounded-circle" width="50px" height="50px"/>  
                              @endif                    
                             
                              
                             
                             
                                                                 
                            </div>
                            <div class="rounded-4 d-flex flex-column me-2"  @style(['background-color:black' ,'height:auto','max-height:300'])>
                                <p class="ps-2 " @style(['font-size:15px','color:white'])>
                                  
                                       @foreach ($users as $user)
                                           @if ($user->id == $lastreplaycomment->replay_user_id)
                                           <span @style(['color:powderblue'])> {{$user->name}}</span> 
                                           @endif
                                       @endforeach
                                 
                                    
                                    {{$lastreplaycomment->content}}</p>                             
                                <p class="justify-content-center d-flex flex-row gap-2" @style(['font-size:12px','color:white'])><span>Created By : <span @style(['color:crimson'])>{{$lastreplaycomment->user->name}}</span></span> <span> Created At : <span @style(['color:powderblue'])>{{$replaycomment->created_at}}</span></span></p>
                               
                                
                               
                            </div>
                            <form action="lastreplaycomments/{{$lastreplaycomment->id}}" method="POST">
                              @csrf
                              @method('DELETE')
                            <div class="d-flex flex-row gap-5 justify-content-around">
                                   
                                @if ($bool)                               
                                   <a class="text-dark replay " @style(['font-size:19px','text-decoration:none']) href={{route('lastreplaycomments.create',['replay_comment_id'=>$replaycomment->id , 'replay_user_id'=>$lastreplaycomment->user_id])}}>Replay</a>                              
                              
                                    <a class="text-warning" @style(['font-size:19px','text-decoration:none'])>React</a>
                                
                                @if ($lastreplaycomment->user_id == $user_id)
                                    <a class="text-success " @style(['font-size:19px','text-decoration:none']) href={{route('lastreplaycomments.edit',$lastreplaycomment->id)}} >Edit</a>
                                    <input class="text-danger" @style(['font-size:19px','text-decoration:none','background-color:transparent','border:none']) value="Delete" type="submit" />
                                @endif
                                @endif
                           </div>
                          </form>
                        </div>
                           @endif
                       @endforeach
                        
                     @endforeach
                       
                    @empty
                        <h1>The Comment Is Empty</h1>
                    
                    @endforelse
                    
                </section>
            </div>
        </div>
    </main>
</div>


@if ($bool)
<div class="container-fluid w-100 bg-info position-absolute bottom-0 left-0 ">
    <div class="row ">
       <form action={{route('comments.store',['post_id'=>$post_id])}} method="POST">
         @csrf
         <div class="col-12 ">       
             <label for="content" class="form-label">Write a Comment</label>
             <input name="content" type="text" class="form-control "/>       
             @error('content')
                 <p class="text-danger text-center">{{$message}}</p>
             @enderror 
        </div>
         <div class="col-12 text-end ">
             <button type="submit" class="btn btn-dark mt-3">Write</button>
         </div>
      </form>
    </div>
 </div>   
@endif
