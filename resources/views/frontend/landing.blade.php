@extends('layouts.master')
@section('content')
    <div class="row">
        @foreach($course->course as $data)
            <div class="col-md-3 mt-3 card">
                <div class="card-header">
                    <p>{{$data->course_name}}</p>
                </div>
                <div class="card-body">
                    <p> {{ $data->course_description }} </p>
                    <p> {{ $data->course_cost }} </p>
                </div>
                <div class="card-footer">
                    <p> {{ $data->created_at }} </p>
                </div>
            </div>
        @endforeach
        
    </div>
@endsection