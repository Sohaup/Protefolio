@extends('main')

<div class="container w-75" @style(["position:absolute" , "left:15%","top:30%"])>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-title"></div>
                <div class="card-img text-center">
                    <img class="img-thumbnail" src={{$avatar->path}} width="300px"  height="300px"/>
                </div>
                <div class="card-body">
                    <form action="/avatar/{{$avatar->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger ">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>