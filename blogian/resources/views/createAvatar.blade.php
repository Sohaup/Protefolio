@extends('main')


<div class="w-50 bg-light h-50 position-absolute text-center " @style(['left:25%;' , 'top:20%;' , 'border-radius:64px;']) >
    <h1 class="h1 text-dark text-center">Choose Your Avatar</h1>
<form enctype="multipart/form-data" class="position-relative " @style(['top:20%']) method="POST" action="/avatar">
    @csrf
 <label for="avatar" class="form-label">Choose Your Avatar</label>
 <input type="file" name="avatar" class="form-control w-75s"/>
 @error('avatar')
     <h4 class="alert alert-danger">{{$message}}</h4>
 @enderror
 <button type="submit" class="btn btn-outline-dark mt-5" @style(['position:relative;' , 'top:90%;','left:40%'])>Choose</button>
</form>
</div>