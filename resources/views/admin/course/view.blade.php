@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')
    <div class="row">
            <div class="col-4">
                <x-adminlte-info-box title="528" text="User Registrations" icon="fas fa-lg fa-user-plus text-primary"
                theme="gradient-primary" icon-theme="white"/>
            </div>
            <div class="col-4">
                <x-adminlte-info-box title="528" text="User Registrations" icon="fas fa-lg fa-user-plus text-primary"
                theme="gradient-primary" icon-theme="white"/>
            </div>
            <div class="col-4">
                <x-adminlte-info-box title="528" text="User Registrations" icon="fas fa-lg fa-user-plus text-primary"
                theme="gradient-primary" icon-theme="white"/>
            </div>
        </div>
        <div class="row justify-content-end">
            <a href="#" class="btn btn-solid btn-success text-white m-3"> + New Course </a>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12 bg-white card p-3 pt-5">

                
                <table class="table" id="courseTable">
                    <thead>
                      <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Capacity</th>
                        <th scope="col">Cost</th>
                        <th scope="col">Description</th>
                        <th scope="col">Tutor</th>
                        <th scope="col">No. of Students</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-group-divider">
    
                        @foreach ($course->course as $data)
                            <tr>
                                <td> {{ $data->course_name}} </td>
                                <td> {{ $data->course_capacity }} </td>
                                <td> {{ $data->course_cost }} </td>
                                <td> {{ $data->course_description }} </td>
                                <td> {{ $data->tutor->name ?? 'Not Assigned'}} </td>
                                <td> {{ $data->student_count }} </td>
                                <td> <a href="#">EDIT</a> <a href="#">DELETE</a> </td>
                            </tr>
                        @endforeach
                      
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
          $('#courseTable').DataTable();
        });
       </script>

@stop

