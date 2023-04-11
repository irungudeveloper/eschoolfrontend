<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;

class LandingController extends Controller
{
    //

    public function landingPage()
    {
        # code...
        $response = Http::get('http://localhost:8001/api/course/visible');

        if ($response->ok()) 
        {
            # code...
            $responseBody = json_decode($response);

            return view('frontend.landing')->with('course',$responseBody);
        }

        return response()->json($response->status());

    }
}
