@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')
    <div class="row">
            <div class="col-4">
                <x-adminlte-info-box title="528" text="Job Posts" icon="fas fa-lg fa-user-plus text-primary"
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
        <div class="row justify-content-end">
            <a href="#" class="btn btn-solid btn-success text-white m-3"> + New Job </a>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12 bg-white card p-3 pt-5">

                
                <table class="table" id="jobTable">
                    <thead>
                      <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Deadline</th>
                        <th scope="col">Visible</th>
                        <th scope="col">No. of Applicants</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-group-divider">
    
                        @foreach ($job->jobs as $data)
                            <tr>
                                <td> {{ $data->title}} </td>
                                <td> {{ $data->description }} </td>
                                <td> {{ $data->deadline }} </td>
                                <td> {{ $data->available ?? "Not Visible"}}</td>
                                <td> {{ $data->application_count ?? 'No Applications'}} </td>
                                <td><a href="{{route('job.applicant',$data->id)}}">VIEW</a> <a href="{{route('job.edit',$data->id)}}">EDIT</a> <a href="{{route('job.delete',$data->id)}}">DELETE</a></td>
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
          $('#jobTable').DataTable();
        });
       </script>

@stop

