<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use Session;

class JobController extends Controller
{
    //

    public function index()
    {
        # code...
        $request = Http::withToken(Session::get('token'))
                        ->get('http://localhost:8001/api/jobs/all');

        if ($request->ok()) 
        {
            # code...
            $responseBody = json_decode($request->body());

            return view('admin.job.view')->with('job', $responseBody);
        }

        return $request->status();
    }

    public function create()
    {
        # code...
        return view('admin.job.create');
    }

    public function store(Request $request)
    {
        # code...
        $available = 0;
        if ($request->input('available')) 
        {
            # code...
            $available = 1;
        }
        $jobPost = Http::withToken(Session::get('token'))
                            ->post('http://localhost:8001/api/jobs/create',[
                                    'title'=>$request->input('title'),
                                    'description'=>$request->input('description'),
                                    'deadline'=>$request->input('deadline'),
                                    'available'=>$available,
                                ]);
        return response()->json(['response'=>$jobPost->status(),'responseBody'=>$jobPost->body()]);
    }
    public function edit($id)
    {
        # code...
        $request = Http::withToken(Session::get('token'))
                        ->get('http://localhost:8001/api/jobs/edit/'.$id);

        if ($request->ok()) 
        {
            # code...
            $responseBody = json_decode($request->body());
            return view('admin.job.edit')->with('job', $responseBody);
        }

        return $request->status();
    }

    
    public function update(Request $request, $id)
    {
        # code...
        $available = 0;
        if ($request->input('available')) 
        {
            # code...
            $available = 1;
        }
        $jobPost = Http::withToken(Session::get('token'))
                            ->post('http://localhost:8001/api/jobs/edit/'.$id,[
                                    'title'=>$request->input('title'),
                                    'description'=>$request->input('description'),
                                    'deadline'=>$request->input('deadline'),
                                    'available'=>$available,
                                ]);
        return response()->json(['response'=>$jobPost->status(),'responseBody'=>$jobPost->body()]);

    }

    public function delete($id)
    {
        # code...
        $request = Http::withToken(Session::get('token'))
                        ->delete('http://localhost:8001/api/jobs/delete/'.$id);

        if ($request->ok()) 
        {
            # code...
            $responseBody = json_decode($request->body());

            return redirect()->route('job.all');
        }

        return $request->status();
    
    }

    public function applicants($id)
    {
        # code...
        $request = Http::withToken(Session::get('token'))
                        ->get('http://localhost:8001/api/jobs/'.$id.'/applicant');

        if ($request->ok()) 
        {
            # code...
            $responseBody = json_decode($request->body());
            return view('admin.job.applicants')->with('job', $responseBody);
        }

        return $request->status();
    }

}
