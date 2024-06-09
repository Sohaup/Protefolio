@extends('main')

<section class="d-flex flex-row position-absolute mt-3 " @style(['left:40%'])>
    <img src={{$post->img}} class="object-fit-cover rounded-4 " width="200px" , height="200px"/>
</section>

 <div class="container bg-light rounded-3 mt-5" @style(['top:30%','position:absolute','left:0px','right:0px'])>
    <form action={{route('postspath.update',$post->id)}} method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    <div class="row">
        <div class="col-12">
            <h1 class="h1 text-center">Publish A Post</h1>
        </div>
        <div class="col-12">
           <label for="title" class="form-label">Title</label>
           <input name="title" type="text"  class="form-control" value={{$post->title}}/>
           @error('title')
               <p class="text-danger">{{$message}}</p>
           @enderror
        </div>
        <div class="col-12">
            <label for="img" class="form-label">Img</label>
            <input name="img" type="file" placeholder="enter post img" class="form-control" />
            @error('img')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="col-12">
            <label for="content" class="form-label">Content</label>
            <textarea name="content"  placeholder="enter post title" class="form-control">{{$post->content}}</textarea>
            @error('content')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="col-12 text-end">
            <button type="submit" class="btn btn-outline-success mt-3 mb-3">Edit</button>
        </div>
    </div>
   </form>
 </div>
