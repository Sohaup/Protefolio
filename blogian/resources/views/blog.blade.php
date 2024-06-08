@extends('main')

<div class="container">
    <main>
        <div class="row">
          <div class="col-12">
            <section>
                @forelse ($posts as $post)
                    <div class="card mt-3">
                        <div class="card-title text-center h1">{{$post->title}}</div>
                        <div class="card-img"><img src={{$post->img}} class="card-img"/></div>
                        <div class="card-text">{{$post->content}}</div>
                       
                        <div class="card-body d-flex flex-row gap-3 justify-content-center">
                         <button class="btn btn-dark"> Comment</button>
                         <button class="btn btn-warning ">React</button>
                         @if ($user_id == $post->user_id)
                         <button class="btn btn-success">Edit Post</button>
                         <button class="btn btn-danger ">Delete Post</button>
                         @endif
                        </div>
                        
                       
                    </div>
                @empty
                    <h2 class="text-center h2">The Posts Is Empty</h2>
                @endforelse
            </section>
          </div>
          <div class="col-12">
            <section class="d-flex flex-row justify-content-end">
                <button class="btn btn-outline-dark mt-3"><a href={{route('postspath.create')}} @style(['text-decoration:none']) class="text-light">Publish A Post</a></button>
            </section>
          </div>
        </div>
    </main>
</div>