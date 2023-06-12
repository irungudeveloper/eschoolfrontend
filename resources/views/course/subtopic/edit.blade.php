@extends('adminlte::page')

@section('title', 'AdminLTE')


@section('content')

    <div class="row jsutify-content-center bg-white">
        <div class="col-md-12 p-3 ">
            <div class="card">
                <div class="card-header">
                    <p class="h3 text-center">Edit Course Subtopic</p>
                </div>
                <div class="card-body">
                   
                    <form class="row g-3" method="POST" action="{{route('subtopic.update',$course->subtopic->id)}}">
                      @csrf
                        <div class="col-md-12 mb-4">
                          <label for="blog_title" class="form-label">Subtopic Name</label>
                          <input type="text" class="form-control" id="blog_title" name="name" value="{{$course->subtopic->name}}"> 
                        </div>
                        <div class="col-12 mb-4">
                          <button type="submit" class="btn btn-success">Edit Subtopic</button>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
@stop
