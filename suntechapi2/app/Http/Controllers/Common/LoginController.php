<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Http;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Sentinel;
use Illuminate\Support\Facades\Session;



class LoginController extends Controller
{
    public function validator($data){
        return Validator::make($data,[
            'email' => 'required|email|max:255',
            'password' => 'required|min:0',
        ]);
                    
    }

    public function login(Request $request){
        if($request->isMethod('post')){
            $validator      = $this->validator($request->all());
            $email          = $request->input('email');
            $password       = $request->input('password');

            if($validator -> fails()){
                return view('admin.login.index', ['error' => ' Wrong format']);
            }

            $login = Http::post("http://127.0.0.1:8000/api/login",[
                'email' => $email,
                'password' => $password
            ]);

            $user = json_decode($login);

            Auth::loginUsingId($user->id);
            Session::put('idUser', $user -> id);
            // session(['idUser' => $user -> id ]);

            if(Auth::user()->roles -> first() -> id == 1){
                return redirect('/exams');
            }

            // dd(Auth::user() -> email);

            // dd($user);

            // dd($login);
            // dd(auth()->user());
            // dd(session('user'));

            // if( Auth::attempt(['email' => $email, 'password' => $password])){
            //     $role = Auth::user() -> roles -> first() -> id;
            //     if($role ==1){
            //         return redirect('exams')->with('user', Auth::user());
            //     }else{
            //         return redirect('home')->with('user', Auth::user());
            //     }
            // }else{
            //     return view('admin.login.index', ['error' => ' Login failedd']);
            // }

            return redirect('/home');
            // return back()->withInput();
        }

        return view('admin.login.index');
    }

    // Auth::logout();
    // $request->session()->invalidate();
    // $request->session()->regenerateToken();
    // $logout = Http::post("http://127.0.0.1:8000/api/logout");
    // return response()->json([
    //     'status_code' => 200,
    //     'message' => 'Logout successfull',
    // ]);
    // return redirect('/login');

    ////////////////============
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        session() -> pull('user');

        return redirect('/login');
    }

}
