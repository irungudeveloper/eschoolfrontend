@extends('adminlte::page')

@section('title', 'AdminLTE')


@section('content')

    <div class="row jsutify-content-center bg-white">
        <div class="col-md-12 p-3 ">
            <div class="card">
                <div class="card-header">
                    <p class="h3 text-center">Create Course Subtopic</p>
                </div>
                <div class="card-body">
                   
                    <form class="row g-3" method="POST" action="{{route('subtopic.store')}}">
                      @csrf
                      <div class="col-md-12 mb-4">
                        <label for="courseid">Topic Name</label>
                        <select name="topic_id" id="topicid" class="form-control">
                          @forelse($course->topic as $courseData)
                            <option value=" {{ $courseData->id }} "> {{ $courseData->name }} </option>
                          @empty
                            <option value="">No Topics Available </option>
                          @endforelse
                        </select>
                      </div>
                        <div class="col-md-12 mb-4">
                          <label for="blog_title" class="form-label">Subtopic Name</label>
                          <input type="text" class="form-control" id="blog_title" name="name"> 
                        </div>
                        <div class="col-12 mb-4">
                          <button type="submit" class="btn btn-success">Create Subtopic</button>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
@stop
