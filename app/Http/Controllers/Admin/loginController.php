<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class loginController extends Controller
{
    public function show_login()
    {
        return view('admin.auth.login');
    }

    public function login(LoginRequest $request)
    {

        if (auth()->guard('admin')->attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect()->route('admin.dashboard');
        }
    }

    public function logout()
    {
        auth()->logout();
        return view('admin.auth.login');
    }
}
