@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')
    <div class="row">
            <div class="col-4">
                <x-adminlte-info-box title="528" text="Courses Assigned" icon="fas fa-lg fa-user-plus text-primary"
                theme="gradient-primary" icon-theme="white"/>
            </div>
            <div class="col-4">
                <x-adminlte-info-box title="528" text="Visible Job Posts" icon="fas fa-lg fa-user-plus text-primary"
                theme="gradient-primary" icon-theme="white"/>
            </div>
            <div class="col-4">
                <x-adminlte-info-box title="528" text="Total Applicants" icon="fas fa-lg fa-user-plus text-primary"
                theme="gradient-primary" icon-theme="white"/>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12 bg-white card p-3 pt-5">

                
                <table class="table" id="jobTable">
                    <thead>
                      <tr>
                        <th scope="col">Course Name</th>
                        <th scope="col">Course Description</th>
                        <th scope="col">Capacity</th>
                        <th scope="col">Students</th>
                        <th scope="col">Topics</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-group-divider">
    
                        @forelse ($courses->course as $data)
                            <tr>
                                <td> {{ $data->course_name}} </td>
                                <td> {{ $data->course_description }} </td>
                                <td> {{ $data->course_capacity }} </td>
                                <td> {{ $data->student_count ?? "Not Visible"}}</td>
                                <td> {{ $data->topic_count ?? 'No Applications'}} </td>
                                <td><a href="{{route('tutor.course',$data->id)}}">VIEW</a></td>
                            </tr>
                        @empty
                            <tr>
                                <td>No Courses Assigned Yet</td>
                            </tr>
                        @endforelse
                    </tbody>
                  </table>
            </div>
        </div>
    </div>

    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <script>
        $(document).ready(function() 
        {
          $('#jobTable').DataTable();
        });
       </script>

@stop

