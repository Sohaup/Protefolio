@extends('main')

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
                          <button class="btn btn-dark comment" type="button"  id={{$post->id}}> Comment</button>
                          @if($bool)
                         <button class="btn btn-warning " type="button">React</button>
                       
                         @if ($user->id == $post->user_id)
                         <button class="btn btn-success"><a href={{route('postspath.edit' , $post->id)}} @style(['text-decoration:none','color:white'])>Edit Post</a></button>                       
                           
                         <button class="btn btn-danger " type="submit">Delete Post</button>
                         </form>
                         @endif    
                         @endif                                            
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