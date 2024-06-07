@extends('main')


<div class="d-flex w-50 position-absolute" @style('left:40%')>
    <img src={{$avatar->path}} width='200px' height='200px' class='rounded-circle'/>
</div>

<div class="container rounded-xl w-75   " @style(['top:30%;' , 'position:absolute' , 'left:10%'])>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-title text-center">
                    <h1 class="text-dark h1">Avatar</h1>
                </div>
                <div class="card-body">
                    <form class="d-flex flex-column gap-3" enctype="multipart/form-data"  action={{ route('avatar_update', $id) }}  method="POST">
                        @method('PUT')
                        @csrf
                        
                        <label for="avatar" class="form-label">Choose Your Avatar</label>
                        <input type="file" name="avatar" class="form-control"  />
                        @error('avatar')
                            <p class="alert alert-danger text-center  ">{{$message}}</p>
                        @enderror
                        <button type="submit" class="btn btn-outline-dark w-25 align-self-end">Choose</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>