<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use Session;

class BlogController extends Controller
{
    //
    public function index()
    {
        # code...
        $request = Http::withToken(Session::get('token'))
                        ->get('http://localhost:8001/api/blog/all');

        if ($request->ok()) 
        {
            # code...
            $responseBody = json_decode($request->body());

            return view('admin.blog.view')->with('blog', $responseBody);
        }

        return $request->status();
    }

    public function create()
    {
        # code...
        return view('admin.blog.create');
    }

    public function store(Request $request)
    {
        # code...
        $visible = 0;
        $student = 0;
        $tutor = 0;
        $archive = 0;

        if ($request->input('visible')) 
        {
            # code...
            $visible = 1;
        }
        if ($request->input('student')) 
        {
            # code...
            $student = 1;
        }
        if ($request->input('tutor')) 
        {
            # code...
            $tutor = 1;
        }
        if ($request->input('archive')) 
        {
            # code...
            $archive = 1;
        }
        if ($request->hasFile('image')) 
        {
            $file = $request->file('image');

            $blogpost = Http::timeout(60)
                                ->withToken(Session::get('token'))
                                ->attach('image',file_get_contents($file),'image.jpg')
                                ->post('http://localhost:8001/api/blog/create',[
                                        'title'=>$request->input('title'),
                                        'description'=>$request->input('description'),
                                        'student'=>$student,
                                        'visible'=>$visible,
                                        'tutor'=>$tutor,
                                        'archive'=>$archive,
                                    ]);
        }
        else
        {
            $blogpost = Http::timeout(60)
                                ->withToken(Session::get('token'))
                                ->post('http://localhost:8001/api/blog/create',[
                                        'title'=>$request->input('title'),
                                        'description'=>$request->input('description'),
                                        'student'=>$student,
                                        'visible'=>$visible,
                                        'tutor'=>$tutor,
                                        'archive'=>$archive,
                                    ]);
        }
        
        return redirect()->route('blog.index');

    }

    public function edit($id)
    {
        # code...
        $request = Http::withToken(Session::get('token'))
                        ->get('http://localhost:8001/api/blog/edit/'.$id);

        if ($request->ok()) 
        {
            # code...
            $responseBody = json_decode($request->body());
            return view('admin.blog.edit')->with('blog', $responseBody);
        }

        return $request->status();
    }

    public function delete($id)
    {
        # code...
        $request = Http::withToken(Session::get('token'))
                        ->delete('http://localhost:8001/api/blog/delete/'.$id);

        if ($request->ok()) 
        {
            # code...
            $responseBody = json_decode($request->body());

            return redirect()->route('blog.index');
        }

        return $request->status();
    }
}
