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

}
