<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected function redirectTo()
    {
        // Check if the user is an admin
        if (Auth::user()->role == 'admin') {
            return '/admin/index'; // Change this to the desired admin route
        }
        
        // Default redirection for regular users
        return '/user/dashboard'; // Change this to the desired user route
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Handle user authenticated event.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $users
     * @return \Illuminate\Http\Response
     */
    protected function authenticated(Request $request, $users)
    {
        if ($users->role === 'admin') {
            return redirect()->route('admin.index');
        }

        return redirect()->route('user.location');
    }
}
