@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    @forelse($courses->course as $courseData)
        <h1 class="m-0 text-dark">{{$courseData->course_name}}</h1>
    @empty
       <h1>No Course Available</h1>
    @endforelse
@stop

@section('content')
    <div class="row justify-content-center">
            @forelse($courses->course as $courseData)
            <div class="col-md-12 bg-white card p-3 pt-5">
                
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="nav nav-tabs" id="myTabs">
                                <li class="nav-item active">
                                    <a href="#material" class="nav-link active" data-toggle="tab">COURSE MATERIAL</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#timetable" class="nav-link" data-toggle="tab">COURSE TIMETABLE</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#students" class="nav-link" data-toggle="tab">COURSE STUDENTS</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                
                                <div class="tab-pane active" id="material">

                                    <div class="row">
                                        
                                        <div class="col-12">
                                            @forelse($courseData->topic as $courseTopic)
                                            <div class="card">
                                                <div class="card-header">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <h4> {{ $courseTopic->name }} </h4>
                                                        </div>
                                                        <div class="col-6">
                                                            <a href="{{route('topic.delete',$courseTopic->id)}}" class="btn btn-solid btn-danger pl-5 pr-5 ml-2 float-right">Delete Topic</a>
                                                            <a href="{{route('topic.edit',$courseTopic->id)}}" class="btn btn-solid btn-success pl-5 pr-5 float-right">Edit Topic</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    @forelse($courseTopic->subtopics as $courseSubtopics)
                                                        <div class="row mt-2 mb-4">
                                                            <div class="col-6">
                                                                <h5> {{$courseSubtopics->name}} </h5>
                                                            </div>
                                                            <div class="col-6">
                                                                <a href="{{route('subtopic.delete',$courseSubtopics->id)}}" class="btn btn-solid btn-danger pl-5 pr-5 ml-2 float-right">Delete Subtopic</a>
                                                                <a href="{{route('subtopic.edit',$courseSubtopics->id)}}" class="btn btn-solid btn-success pl-5 pr-5 float-right">Edit Subtopic</a>

                                                            </div>
                                                        </div>
                                                        
                                                        @forelse($courseSubtopics->coursematerial as $courseMaterial)
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <p>Course Material Name: {{ $courseMaterial->course_material_name }}</p>
                                                                    <p><span><a href="{{$courseMaterial->course_material_link}}">Download Content</a></span></p>
                                                                    <p>Published at: {{$courseMaterial->created_at}}</p>
                                                                    <a href="{{route('material.edit',$courseMaterial->id)}}" class="btn btn-solid btn-success pl-5 pr-5 ">Edit Material</a>
                                                                    <a href="{{route('material.delete',$courseMaterial->id)}}" class="btn btn-solid btn-danger pl-5 pr-5 ml-2">Delete Material</a>
                                                                </div>
                                                            </div>
                                                        @empty
    
                                                        @endforelse
                                                    @empty
                                                        <p>No Data Available</p>
                                                    @endforelse
                                                </div>
                                            </div>
                                        @empty  
                                            <p>No Course Material Available</p>
                                        @endforelse
                                        </div>
                                    </div>

                                   
                                </div>    
                                <div class="tab-pane" id="timetable">
                                    <div class="row">
                                        <div class="col-12">
                                            <a href="#" class="btn btn-solid btn-success pl-2 pr-2 mt-2 mb-2 float-right">+ Create TimeSlot</a>
                                        </div>
                                        <div class="col-12">
                                            <div class="card mt-2">
                                                <div class="card-header">
                                                    <h3>Course Timing</h3>
                                                </div>
                                                <div class="card-body">
                                                    

                                                    <table class="table table-md-responsive">
                                                        <thead>
                                                            <tr>
                                                                <th>Start Time</th>
                                                                <th>End Time</th>
                                                                <th>Class Link</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @forelse($courseData->timing as $courseTiming)
                                                            <tr>
                                                                <td>{{$courseTiming->start_time}}</td>
                                                                <td>{{$courseTiming->end_time}}</td>
                                                                <td><a href="{{$courseTiming->zoom_link}}">{{$courseTiming->zoom_link}}</a></td>
                                                                <td><a href="#">VIEW</a></td>   
                                                            </tr>
                                                            @empty

                                                            @endforelse
                                                        </tbody>
                                                    </table>
                                                </div>
                                           </div>
                                        </div>
                                    </div>
                                    
                                    
                                   
                                </div>
                                <div class="tab-pane" id="students">
                                   <table class="table table-md-responsive">
                                    <thead>
                                        <tr>
                                            <th>Student Name</th>
                                            <th>Profile Photo</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-group-divider">
                                        @forelse($courseData->student as $courseStudent)
                                            <tr>
                                                <td> {{ $courseStudent->name }} </td>
                                                <td> <img src="{{ $courseStudent->profile_photo }}" alt="student photo"> </td>
                                                <td><a href="#">VIEW</a></td>
        
                                            </tr>
                                        @empty
                                            <tr>
                                                <td>No Student Enrolled Yet</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                   </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
            </div>
            @empty
                <h2>No Data Available</h2>
            @endforelse
        </div>
{{-- 
    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script> --}}
    {{-- <script> --}}
        {{-- $(document).ready(function(){ --}}
            {{-- // $('#myTabs').click('show', function(e) {   --}}
            {{-- //     paneID = $(e.target).attr('href'); --}}
            {{-- //     src = $(paneID).attr('data-src'); --}}
            {{-- //     // if the iframe hasn't already been loaded once --}}
            {{-- //     if($(paneID+" iframe").attr("src")=="") --}}
            {{-- //     { --}}
            {{-- //         $(paneID+" iframe").attr("src",src); --}}
            {{-- //     } --}}
            {{-- // }); --}}
        {{-- // }); --}}
    {{-- //    </script> --}}

@stop

