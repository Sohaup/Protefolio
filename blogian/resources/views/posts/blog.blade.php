@extends('main')
@php
  function Find($id , $arr , $val , $user) {
   
    foreach ($arr as $index => $postreact) {
       if ($postreact->post_id == $id && $user->id == $postreact->user_id) {            
        return $postreact->$val;
        break;
       }
    }
  }

  
@endphp
<div class="container">
    <main>
        <div class="row">
            <div class="col-12">
                @if ($bool)
                <x-Header :user=$user />
                @else
                <x-Header user='' />
                @endif
               
            </div>
          <div class="col-12">
            <section>
                @forelse ($posts as $post)                    
                    <div class="card mt-3">
                        <div class="card-title text-center h1">{{$post->title}}</div>
                        <div class="card-img"><img src={{$post->img}} class="card-img"/></div>
                        <div class="card-text " @style(['font-family:sans-serif'])>{{$post->content}}</div>
                      
                        <div class="card-body d-flex flex-row gap-3 justify-content-center">
                         <form action="/postspath/{{$post->id}}" method="POST">                            
                            @csrf
                            @method('DELETE')
                          <button class="btn btn-outline-dark comment" type="button" onclick="handleClick({{$post->id}})"><img src="./imgs/comments2.svg" width="70px" height="30px"/></button>
                          @if($bool)
                        <select class="form-select btn btn-outline-warning  text-center rounded-2 react text-dark fw-bold " @style(['width:100px','font-size:18px','height:45px']) onchange="handleChange(this , {{$post->id}} , {{Find($post->id , $postreacts , 'id',$user)}})" >
                                                          
                            
                             @if (Find($post->id , $postreacts , 'value',$user))
                                <option class="react_update" selected> {{Find($post->id , $postreacts , 'value',$user)}}</option>
                             @else
                                <option class="react_insert" selected >React</option>
                             @endif
                             
                            <option class="love">&#128151</option>
                            <option class="support">&#128525</option>
                            <option class="like" >&#X1F44D</option>
                            <option class="happy">&#128514</option>
                            <option class="sad">&#128549</option>
                            <option class="confused">&#128531</option>
                            <option class="trash bg-danger">Delete</option>
                        </select>
                       
                         @if ($user->id == $post->user_id)
                         <button class="btn btn-outline-success" type="button"><a href={{route('postspath.edit' , $post->id)}} @style(['text-decoration:none','color:white'])><img src="./imgs/edit.svg" width="70px" height="30px"/></a></button>                       
                           
                         <button class="btn btn-outline-danger " type="submit"><img src="./imgs/delete.svg" width="70px" height="30px"/></button>
                        
                         @endif    
                         @endif    
                        </form>                                        
                        </div>
                       
                       
                    </div>
                @empty
                    <h2 class="text-center h2 text-dark ">The Posts Is Empty</h2>
                @endforelse
            </section>
          </div>
          <div class="col-12">          
            <section class="d-flex flex-row justify-content-end">
                @if($bool)
                <button class="btn btn-outline-dark mt-3"><a href={{route('postspath.create')}} @style(['text-decoration:none']) class="text-light">Publish A Post</a></button>
                @else
                <button class="btn btn-outline-dark mt-3 me-3"><a href={{route('register')}} @style(['text-decoration:none']) class="text-light">Register</a></button>
                <button class="btn btn-outline-dark mt-3"><a href={{route('login')}} @style(['text-decoration:none']) class="text-light">Login</a></button>
                @endif
            </section>
          
          </div>
        </div>
    </main>
</div>