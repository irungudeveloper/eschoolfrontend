@extends('adminlte::page')

@section('title', 'AdminLTE')


@section('content')

    <div class="row jsutify-content-center bg-white">
        <div class="col-md-12 p-3 ">
            <div class="card">
                <div class="card-header">
                    <p class="h3 text-center">Create Course Topic</p>
                </div>
                <div class="card-body">
                   
                    <form class="row g-3" method="POST" action="{{route('topic.create')}}">
                      @csrf
                      <div class="col-md-12 mb-4">
                        <label for="courseid"></label>
                        <select name="course_id" id="courseid" class="form-control">
                          @forelse($courses->course as $courseData)
                            <option value=" {{ $courseData->id }} "> {{ $courseData->course_name }} </option>
                          @empty
                            <option value="">No Couses Available </option>
                          @endforelse
                        </select>
                      </div>
                        <div class="col-md-12 mb-4">
                          <label for="blog_title" class="form-label">Topic Name</label>
                          <input type="text" class="form-control" id="blog_title" name="name"> 
                        </div>
                        <div class="col-12 mb-4">
                          <button type="submit" class="btn btn-success">Create Topic</button>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
@stop
