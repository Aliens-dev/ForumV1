<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Forum;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['login','loginPost','index']);
        $this->middleware('guest')->only(['login','loginPost']);
    }

    public function index () {
        $forums = Forum::all();
        return view('home',compact('forums'));
    }

    public function login(){
        return view('login');
    }
    public function loginPost(Request $request){
        $this->validate($request, [
            'email'=> 'email|required',
            'password'=> 'required',
        ]);
        $auth = Auth::attempt(['email'=>$request->email,'password'=>$request->password]);

        if($auth){
            return redirect(route('home.index'));
        }else {
            return back()->withInput()->with(['failed'=>'Wrong email or password']);
        }
    }
    public function settings() {

    }
    public function profile(){
        $user = auth()->user();
        return view('profile',compact('user'));
    }
    public function logout (){
        Auth::logout();
        return redirect(route('home.index'));
    }
}
