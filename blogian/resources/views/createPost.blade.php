@extends('main')

 <div class="container bg-light rounded-3" @style(['top:30%','position:absolute','left:0px','right:0px'])>
    <form action={{route('postspath.store')}} method="POST" enctype="multipart/form-data">
        @csrf
    <div class="row">
        <div class="col-12">
            <h1 class="h1 text-center">Publish A Post</h1>
        </div>
        <div class="col-12">
           <label for="title" class="form-label">Title</label>
           <input name="title" type="text" placeholder="enter post title" class="form-control"/>
           @error('title')
               <p class="text-danger">{{$message}}</p>
           @enderror
        </div>
        <div class="col-12">
            <label for="img" class="form-label">Img</label>
            <input name="img" type="file" placeholder="enter post img" class="form-control"/>
            @error('img')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="col-12">
            <label for="content" class="form-label">Content</label>
            <textarea name="content"  placeholder="enter post title" class="form-control"></textarea>
            @error('content')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="col-12 text-end">
            <button type="submit" class="btn btn-outline-dark mt-3 mb-3">Publish</button>
        </div>
    </div>
   </form>
 </div>
