<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use Session;

class TutorController extends Controller
{
    //

    public function index()
    {
        # code...
        $request = Http::withToken(Session::get('token'))
                        ->get('http://localhost:8001/api/tutor');

        // if ($request->ok()) 
        // {
        //     # code...
        //     $responseBody = json_decode($request->body());
        //     return response()->json(['tutor'=>$responseBody]);
        //     // return view('admin.job.applicants')->with('tutor', $responseBody);
        // }

        return response()->json(['statusCode'=>$request->status(),'body'=>$request->body()]);
    }

    public function viewCourses()
    {
        # code...
        $request = Http::withToken(Session::get('token'))
                        ->get('http://localhost:8001/api/tutor/courses');

        if ($request->ok()) 
        {
            # code...
            $responseBody = json_decode($request->body());
            // return response()->json(['courses'=>$responseBody]);
            return view('tutor.course')->with('courses', $responseBody);
        }

        return response()->json(['statusCode'=>$request->status(),'body'=>$request->body()]);
    }

    public function viewCourse($id)
    {
        # code...
        $request = Http::withToken(Session::get('token'))
                        ->get('http://localhost:8001/api/tutor/course/'.$id);

        if ($request->ok()) 
        {
            # code...
            $responseBody = json_decode($request->body());
            // return response()->json(['courses'=>$responseBody]);
            return view('tutor.coursedetails')->with('courses', $responseBody);
        }

        return response()->json(['statusCode'=>$request->status(),'body'=>$request->body()]);
    }

}
