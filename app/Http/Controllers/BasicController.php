<?php

namespace App\Http\Controllers;

use Auth;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;

class BasicController extends Controller
{
    public function __construct(){
      $this->middleware('guest',['except' => 'destroy','except' => 'check']);
    }
    public function check(){
        if(Auth::check())
          return view('admin.home');
        else
          return view('admin.login');
    }

    public function signIn(){
      if(!auth()->attempt(request(['username','password']))){
        return back()->withErrors([
          'message' => 'Please check your credintials and try again.'
        ]);
      }

      return redirect('/');
    }

    public function store() {
        // Validate the form
        $this->validate(request(), [
            'instructor' => 'required',
            'username' => 'required',
            'password' => 'required|confirmed',
        ]);
        // Create and Save the user

        // Your fixed
        $user = User::create([
            'instructor' => request('instructor'),
            'username' => request('username'),
            'password' => bcrypt(request('password'))
        ]);

        // Optional. Sign them in after registration

        auth()->login($user);

        // Redirect to the homepage
        return redirect('/');
    }

    public function logout(){
        auth()->logout();
        return view('admin.login');
    }
}
