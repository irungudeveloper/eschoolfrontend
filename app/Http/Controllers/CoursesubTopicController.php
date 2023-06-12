<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use Session;

class CoursesubTopicController extends Controller
{
    //
    
    public function create() 
    {
        $request = Http::withToken(Session::get('token'))
                        ->get('http://localhost:8001/api/course/topic/all');

        if ($request->ok()) 
        {
            # code...
            $responseBody = json_decode($request->body());
            return view('course.subtopic.create')->with('course', $responseBody);
        }

        return $request->status();        
    
    }
    
    public function store(Request $request)
    {
        
        $request = Http::withToken(Session::get('token'))
                        ->post('http://localhost:8001/api/course/topic/'.$request->input('topic_id').'/subtopic',[
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

    public function edit($id)
    {

        $request = Http::withToken(Session::get('token'))
                        ->get('http://localhost:8001/api/course/topic/subtopic/'.$id.'/details'); 

        if ($request->ok()) 
        {
            # code...
            $responseBody = json_decode($request->body());
            return view('course.subtopic.edit')->with('course',$responseBody);
        }

        return $request->status();
            
    }

    public function update($id, Request $request)
    {

        // return $id;

        $request = Http::withToken(Session::get('token'))
                            ->post('http://localhost:8001/api/course/topic/subtopic/'.$id.'/update',[
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
                            ->delete('http://localhost:8001/api/course/topic/subtopic/'.$id.'/delete'); 

        if ($request->ok()) 
        {
        # code...
            $responseBody = json_decode($request->body());
            return redirect()->back();
        }

        return $request->status();
    }

}
