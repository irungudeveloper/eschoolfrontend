<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use Session;

class CourseController extends Controller
{
    //

    public function index()
    {
        # code...

        $request = Http::withToken(Session::get('token'))
                        ->get('http://localhost:8001/api/course/all');

        if ($request->ok()) 
        {
            # code...
            $responseBody = json_decode($request->body());

            return view('admin.course.view')->with('course', $responseBody);
        }

        return $request->status();

    }

    public function create()
    {
        # code...
        return view('admin.course.create');
    }

    public function post(Request $request)
    {
        # code...

        // return response()->json($request->file('course_image')->getClientMimeType());

        $visible = 0;
        if ($request->input('visible')) 
        {
            # code...
            $visible = 1;
        }

        if ($request->hasFile('course_image')) 
        {
            $file = $request->file('course_image');

            $coursepost = Http::withToken(Session::get('token'))
                                ->attach('course_image',file_get_contents($file),'image.jpg')
                                ->post('http://localhost:8001/api/course/create',[
                                        'course_name'=>$request->input('course_name'),
                                        'course_cost'=>$request->input('course_cost'),
                                        'course_description'=>$request->input('course_description'),
                                        'visible'=>$visible,
                                    ]);
        }
        else
        {
            $coursepost = Http::withToken(Session::get('token'))
                                ->post('http://localhost:8001/api/course/create',[
                'course_name'=>$request->input('course_name'),
                'course_cost'=>$request->input('course_cost'),
                'course_description'=>$request->input('course_description'),
                'visible'=>$visible,
            ]);
        }

        return response()->json(['response'=>$coursepost->status(),'responseBody'=>$coursepost->body()]);
    }

    public function edit($id)
    {
        # code...
        
        $request = Http::withToken(Session::get('token'))
                        ->get('http://localhost:8001/api/course/'.$id.'/details');

        if ($request->ok()) 
        {
            # code...
            $responseBody = json_decode($request->body());
            return view('admin.course.edit')->with('course', $responseBody);
        }

        return $request->status();
    }

    public function update(Request $request, $id)
    {
        # code...

        // return "here";

        $visible = 0;
        if ($request->input('visible')) 
        {
            # code...
            $visible = 1;
        }
        if ($request->hasFile('course_image')) 
        {
            $file               = $request->file('course_image');
            $file_path          = $file->getRealPath();
            $file_mime          = $file->getMimeType('image');
            $file_uploaded_name = $file->getClientOriginalName();

            $courseUpdate = Http::withToken(Session::get('token'))
                                ->attach('course_image',file_get_contents($file),'image.jpg')
                                ->post('http://localhost:8001/api/course/edit/'.$id,[
                                        'course_name'=>$request->input('course_name'),
                                        'course_cost'=>$request->input('course_cost'),
                                        'course_description'=>$request->input('course_description'),
                                        'visible'=>$visible,
                                    ]);
        }
        else
        {
            $courseUpdate = Http::withToken(Session::get('token'))
                                ->post('http://localhost:8001/api/course/edit/'.$id,[
                'course_name'=>$request->input('course_name'),
                'course_cost'=>$request->input('course_cost'),
                'course_description'=>$request->input('course_description'),
                'visible'=>$visible,
            ]);
        }

        return redirect()->route('courses.all');

    }

    public function delete($id)
    {
        # code...
        $request = Http::withToken(Session::get('token'))
                        ->delete('http://localhost:8001/api/course/delete/'.$id);

        if ($request->ok()) 
        {
            # code...
            $responseBody = json_decode($request->body());

            return redirect()->route('courses.all');
        }

        return $request->status();
    
    }

    public function createTopic()
    {
        # code...
        $request = Http::withToken(Session::get('token'))
                        ->get('http://localhost:8001/api/tutor/courses');

        if ($request->ok()) 
        {
            # code...
            $responseBody = json_decode($request->body());
            // return response()->json(['courses'=>$responseBody]);
            return view('course.topic.create')->with('courses', $responseBody);
        }

        return response()->json(['statusCode'=>$request->status(),'body'=>$request->body()]);

    }

    public function createCourseTopic($course_id, Request $request)
    {
        # code...

        $topic = Http::withToken(Session::get('token'))
                        ->post('http://localhost:8001/api/course/'.$course_id.'/topic',[
                                'name'=>$request->input('topic_name')
                            ]);

        if ($topic->ok()) 
        {
            # code...
            $responseBody = json_decode($topic->body());

            return response()->json($responseBody);
        }

        return $request->status();

    }

}
