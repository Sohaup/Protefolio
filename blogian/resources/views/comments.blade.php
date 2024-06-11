@extends('main')

<div class="container  ">
    <main>
        <div class="row ">
            <div class="col-12 ">
                <section class="d-flex flex-column gap-3 w-75 position-absolute" @style(['max-height:600px','overflow-y:auto','right:0%'])>
                    
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
                                  <a class="text-dark " @style(['font-size:19px','text-decoration:none']) >Replay</a>
                              @if ($bool)
                                  <a class="text-warning" @style(['font-size:19px','text-decoration:none'])>React</a>
                              
                              @if ($comment->user_id == $user_id)
                                  <a class="text-success " @style(['font-size:19px','text-decoration:none']) href={{route('comments.edit',$comment->id)}}>Edit</a>
                                  <input class="text-danger" @style(['font-size:19px','text-decoration:none','background-color:transparent','border:none']) value="Delete" type="submit" />
                              @endif
                              @endif
                         </div>
                        </form>
                      </div>
                      <hr/>                     
                     
               
                      
                      @endif
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
