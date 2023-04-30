@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')
    <div class="row">
            <div class="col-4">
                <x-adminlte-info-box title="528" text="All Blogs" icon="fas fa-lg fa-user-plus text-primary"
                theme="gradient-primary" icon-theme="white"/>
            </div>
            <div class="col-4">
                <x-adminlte-info-box title="528" text="Student Blogs" icon="fas fa-lg fa-user-plus text-primary"
                theme="gradient-primary" icon-theme="white"/>
            </div>
            <div class="col-4">
                <x-adminlte-info-box title="528" text="Tutor Blogs" icon="fas fa-lg fa-user-plus text-primary"
                theme="gradient-primary" icon-theme="white"/>
            </div>
        </div>
        <div class="row justify-content-end">
            <a href="#" class="btn btn-solid btn-success text-white m-3"> + New Blog </a>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12 bg-white card p-3 pt-5">

                <table class="table" id="blogTable">
                    <thead>
                      <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Image</th>
                        <th scope="col">Visible</th>
                        <th scope="col">Tutor Blog</th>
                        <th scope="col">Student Blog</th>
                        <th scope="col">Archive</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-group-divider">
    
                        @foreach ($blog->blog as $data)
                            <tr>
                                <td> {{$data->title}} </td>
                                <td> {{ $data->description }} </td>
                                <td> <img src="{{ $data->image ?? " "}}" alt="" height="20px" width="20px"> </td>
                                <td> {{ $data->visible }} </td>
                                <td> {{ $data->tutor }} </td>
                                <td> {{ $data->student ?? 'Not Visible'}} </td>
                                <td> {{ $data->archive }} </td>
                                <td> <a href="{{route('blog.edit',$data->id)}}">EDIT</a> <a href="{{route('blog.delete',$data->id)}}">DELETE</a> </td>
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
          $('#blogTable').DataTable();
        });
       </script>

@stop

