<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{    
    /**
     * @return object
     */
    public function index()
    {
        return view('admin.auth.login');
    }
    
    /**
     * @param  Request $request
     * @return object
     */
    public function login(Request $request)
    {
        $this->validate($request, ['email' => 'required | email', 'password' => 'required | min:6']);

        if (auth('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
            return redirect()->route('admin.dashboard');
        }
        return back()->withInput($request->only('email', 'remember'))->withErrors(['credential' => 'Invalid Credentials!']);
    }
    
    /**
     * logout
     *
     * @return object
     */
    public function logout()
    {
        auth('admin')->logout();
        return redirect()->route('admin.auth');
    }
}
