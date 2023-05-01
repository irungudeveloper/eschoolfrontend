@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')
    <div class="row justify-content-center">
            <div class="col-10">
                <div class="card">
                    <div class="card-body">
                        @foreach($job->job as $jobData)
                        <p><span>Job Title :</span> {{$jobData->title}} </p>
                        <p><span>Job Description :</span> {{$jobData->description}}</p>
                        <p><span>Job Application Deadline</span> {{$jobData->deadline}} </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12 bg-white card p-3 pt-5">
                <table class="table table-responsive" id="jobTable">
                    <thead>
                      <tr>
                        <th scope="col">Applicant Name</th>
                        <th scope="col">Applicant Email</th>
                        <th scope="col">Applicant Resume</th>
                        <th scope="col">Applicant Cover Letter</th>
                        <th scope="col">Application Date</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-group-divider">
                       @forelse ($jobData->application as $data)
                           <tr>
                                <td>{{$data->name}}</td>
                                <td>{{$data->email}}</td>
                                <td>{{$data->resume}}</td>
                                <td>{{$data->cover_letter}}</td>
                                <td>{{date('d-m-Y', strtotime($data->created_at))}}</td>
                                <td><a href="#">VIEW</a></td>
                           </tr>
                       @empty
                           <tr>
                            <td>NO APPLICATIONS YET</td>
                           </tr>
                       @endforelse
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

