@extends('adminlte::page')

@section('title', 'AdminLTE')


@section('content')
    <div class="row jsutify-content-center bg-white">
        <div class="col-md-12 p-3 ">
            <div class="card">
                <div class="card-header">
                    <p class="h3 text-center">Create New Job</p>
                </div>
                <div class="card-body">
                    <form class="row g-3" method="POST" action="{{route('job.store')}}" enctype="multipart/form-data">
                      @csrf
                        <div class="col-md-12 mb-4">
                          <label for="title" class="form-label">Job Title</label>
                          <input type="text" class="form-control" id="title" name="title">
                        </div>
                        <div class="col-12 mb-4">
                          <label for="description" class="form-label">Job Description</label>
                          <textarea class="form-control" id="description" name="description" rows="3"></textarea>                        
                        </div>
                        <div class="col-md-12 mb-4">
                            <label for="date" class="form-label">Job Application Deadline</label>
                            <input type="text" class="form-control" id="date" name="deadline">
                          </div>
                        <div class="col-md-6 mb-4">
                          <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" name="available" value="1">
                            <label class="form-check-label" for="flexSwitchCheckDefault">Advertise job to front-page</label>
                            </label>
                          </div>
                        </div>
                        <div class="col-12 mb-4">
                          <button type="submit" class="btn btn-success">Create Job</button>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
@stop
