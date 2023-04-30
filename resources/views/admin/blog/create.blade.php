@extends('adminlte::page')

@section('title', 'AdminLTE')


@section('content')
    <div class="row jsutify-content-center bg-white">
        <div class="col-md-12 p-3 ">
            <div class="card">
                <div class="card-header">
                    <p class="h3 text-center">Create New BlogPost/Event</p>
                </div>
                <div class="card-body">
                    <form class="row g-3" method="POST" action="{{route('blog.store')}}" enctype="multipart/form-data">
                      @csrf
                        <div class="col-md-12 mb-4">
                          <label for="blog_title" class="form-label">Blog Title</label>
                          <input type="text" class="form-control" id="blog_title" name="title">
                        </div>
                        <div class="col-md-12 mb-4">
                          <label for="formFile" class="form-label">Blog Image</label>
                          <input class="form-control" type="file" id="formFile" name="image">
                        </div>
                        <div class="col-12 mb-4">
                          <label for="blog_description" class="form-label">Blog Description</label>
                          <textarea class="form-control" id="blog_description" name="description" rows="3"></textarea>                        
                        </div>
                        <div class="col-md-12 mb-4">
                          <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" name="visible" value="1">
                            <label class="form-check-label" for="flexSwitchCheckDefault">Publish blog to front-page (visitors will be able to view)</label>
                            </label>
                          </div>
                        </div>
                        <div class="col-md-12 mb-4">
                            <div class="form-check form-switch">
                              <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" name="tutor" value="1">
                              <label class="form-check-label" for="flexSwitchCheckDefault">Publish blog/event to tutors only</label>
                              </label>
                            </div>
                          </div>
                          <div class="col-md-12 mb-4">
                            <div class="form-check form-switch">
                              <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" name="student" value="1">
                              <label class="form-check-label" for="flexSwitchCheckDefault">Publish blog/event to students only</label>
                              </label>
                            </div>
                          </div>
                        <div class="col-12 mb-4">
                          <button type="submit" class="btn btn-success">Create Blog/Event</button>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
@stop
