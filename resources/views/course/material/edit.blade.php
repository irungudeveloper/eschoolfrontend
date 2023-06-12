@extends('adminlte::page')

@section('title', 'AdminLTE')


@section('content')

    <div class="row jsutify-content-center bg-white">
        <div class="col-md-12 p-3 ">
            <div class="card">
                <div class="card-header">
                    <p class="h3 text-center">Edit Course Material</p>
                </div>
                <div class="card-body">
                   
                    <form class="row g-3" method="POST" action="{{route('material.update',$course->material->id)}}" enctype="multipart/form-data">
                      @csrf
                        <div class="col-md-12 mb-4">
                          <label for="blog_title" class="form-label">Material Name</label>
                          <input type="text" class="form-control" id="blog_title" name="course_material_name" value="{{$course->material->course_material_name}}"> 
                        </div>
                        <div class="col-md-12 mb-4">
                            <label for="blog_material" class="form-label">Material Content</label>
                            <input type="file" class="form-control" id="blog_material" name="course_material_link">
                        </div>
                        <div class="col-12 mb-4">
                          <button type="submit" class="btn btn-success">Edit Material</button>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
@stop
