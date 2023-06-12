<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use Session;

class CourseTopicController extends Controller
{
    //

    public function store(Request $request)
    {
        $coursepost = Http::withToken(Session::get('token'))
                            ->post('http://localhost:8001/api/course/'.$request->input('course_id').'/topic',[
                                    'name'=>$request->input('name'),
                                ]); 
        if ($coursepost->ok()) 
        {
            # code...
            $responseBody = json_decode($coursepost->body());
            return redirect()->back();
        }

        return $coursepost->status();
                                
    }

    public function edit($id)
    {

        $request = Http::withToken(Session::get('token'))
                        ->get('http://localhost:8001/api/course/topic/'.$id.'/details'); 

        if ($request->ok()) 
        {
            # code...
            $responseBody = json_decode($request->body());
            return view('course.topic.edit')->with('course',$responseBody);
        }

        return $request->status();
            
    }

    public function update($id, Request $request)
    {
        $request = Http::withToken(Session::get('token'))
                            ->post('http://localhost:8001/api/course/topic/'.$id.'/update',[
                                    'name'=>$request->input('name'),
                                ]); 

        if ($request->ok()) 
        {
        # code...
        $responseBody = json_decode($request->body());
        return redirect()->back();
        }

        return $request->status();
    }

    public function delete($id)
    {
        $request = Http::withToken(Session::get('token'))
                            ->delete('http://localhost:8001/api/course/topic/'.$id.'/delete'); 

        if ($request->ok()) 
        {
        # code...
        $responseBody = json_decode($request->body());
        return redirect()->back();
        }

        return $request->status();
    }
    
    
}
