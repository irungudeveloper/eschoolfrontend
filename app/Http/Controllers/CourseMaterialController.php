<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use Session;

class CourseMaterialController extends Controller
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
            return view('course.material.create')->with('course', $responseBody);
        }

        return $request->status();
    }

    public function store(Request $request)
    {
        $file = $request->file('course_material_link');

        $material = Http::timeout(60)
                        ->withToken(Session::get('token'))
                        ->attach('course_material_link',file_get_contents($file),'material')
                        ->post('http://localhost:8001/api/course/topic/subtopic/'.$request->input('subtopic_id').'/material',[
                                'course_material_name'=>$request->input('course_material_name'),
                            ]);

        if ($material->ok()) 
        {
            # code...
            $responseBody = json_decode($material->body());
            return redirect()->back();
        }

        return $material->status();

    }

    public function edit($id)
    {
        $request = Http::withToken(Session::get('token'))
                            ->get('http://localhost:8001/api/course/topic/subtopic/material/'.$id.'/details'); 

        if ($request->ok()) 
        {
        # code...
            $responseBody = json_decode($request->body());
            return view('course.material.edit')->with('course',$responseBody);
        }

        return $request->status(); 
    }

    public function update($id, Request $request)
    {
        $material = "";

        if ($request->hasFile('course_material_link')) 
        {
            # code...
            $file = $request->file('course_material_link');

            $material = Http::timeout(60)
                        ->withToken(Session::get('token'))
                        ->attach('course_material_link',file_get_contents($file),'material')
                        ->post('http://localhost:8001/api/course/topic/subtopic/material/'.$id.'/update',[
                                'course_material_name'=>$request->input('course_material_name'),
                            ]);
        }
        else
        {
            $material = Http::timeout(60)
                        ->withToken(Session::get('token'))
                        ->post('http://localhost:8001/api/course/topic/subtopic/material/'.$id.'/update',[
                                'course_material_name'=>$request->input('course_material_name'),
                            ]);
        }

        

        if ($material->ok()) 
        {
            # code...
            $responseBody = json_decode($material->body());
            return redirect()->back();
        }

        return $material->status();
    }

    public function delete($id)
    {
        $request = Http::withToken(Session::get('token'))
                            ->delete('http://localhost:8001/api/course/topic/subtopic/material/'.$id.'/delete'); 

        if ($request->ok()) 
        {
        # code...
            $responseBody = json_decode($request->body());
            return redirect()->back();
        }

        return $request->status();
    }
}
