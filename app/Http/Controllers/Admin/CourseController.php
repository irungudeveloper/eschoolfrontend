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

}
