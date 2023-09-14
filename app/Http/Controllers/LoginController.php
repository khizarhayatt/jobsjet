<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function verification(LoginRequest $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $remember = request('remember', 0);
        $info = [
            'email' => $email,
            'password' => $password,
            'role' => User::ADMIN_ROLE
        ];

        if (Auth::attempt($info, $remember)) {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.dashboard'));
        } else {
            return redirect()->back()->with('error', 'Invalid Credentials !');
        }
    }

    function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
