@extends('adminlte::page')

@section('title', 'AdminLTE')


@section('content')
    <div class="row jsutify-content-center bg-white">
        <div class="col-md-12 p-3 ">
            <div class="card">
                <div class="card-header">
                    <p class="h3 text-center">Update Course</p>
                </div>
                <div class="card-body">
                    <form class="row g-3" method="POST" action="{{ route('course.update',$course->course->id) }}" enctype="multipart/form-data">
                      @csrf
                        <div class="col-md-6 mb-4">
                          <label for="course_name" class="form-label">Course Name</label>
                          <input type="text" class="form-control" id="course_name" name="course_name" value="{{$course->course->course_name}}">
                        </div>
                        <div class="col-md-6 mb-4">
                          <label for="course_cost" class="form-label">Course Cost</label>
                          <input type="integer" class="form-control" id="course_cost" name="course_cost" value="{{$course->course->course_cost}}">
                        </div>
                        <div class="col-md-12 mb-4">
                          <label for="formFile" class="form-label">Course Image</label>
                          <input class="form-control" type="file" id="formFile" name="course_image">
                        </div>
                        <div class="col-12 mb-4">
                          <label for="course_description" class="form-label">Course Description</label>
                          <textarea class="form-control" id="course_description" name="course_description" rows="3">{{$course->course->course_description}}</textarea>                        
                        </div>
                        <div class="col-md-6 mb-4">
                          <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" name="visible" value=" {{$course->course->visible}} ">
                            <label class="form-check-label" for="flexSwitchCheckDefault">Publish course to front-page</label>
                            </label>
                          </div>
                        </div>
                        <div class="col-12 mb-4">
                          <button type="submit" class="btn btn-success">Update Course</button>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
@stop
