<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Http;

use Illuminate\Support\Facades\Hash;

use Laravel\Passport\TokenRepository;
use Laravel\Passport\RefreshTokenRepository;

use App\Models\User;

use Session;

// use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    // use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }

    public function index()
    {
        # code...
        return view('auth.login');
    }        

    public function login(Request $request)
    {
        # code...
         
        $response = Http::post('http://localhost:8001/api/login', [
            'email' => $request->input('email'), //'irungu_applicant_new@gmail.com',
            'password' => $request->input('password'), //'qwerty1234',
        ]);

        if ($response->ok()) 
        {
            # code...
            $responseBody = json_decode($response->body());

            // return var_dump($responseBody);

            $request->session()->put('user', $responseBody->user);
            $request->session()->put('token', $responseBody->token);

            return redirect()->route('home');

        }

        return response()->json($response->status());

    } 

    public function logout()
    {
        # code...
        
        Session::flush();

        return redirect()->route('welcome');

    }
    

}
