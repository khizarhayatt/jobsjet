<?php

namespace App\Http\Controllers;

use App\Events\UserRegisteredEvent;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    function register()
    {
        return view('auth.register');
    }

    function create(RegisterRequest $request)
    {

        $info = [
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role' => User::ADMIN_ROLE,
        ];
        // dd($info);
        $user = User::create($info);
        if ($user and $user->id > 0) {
            UserRegisteredEvent::dispatch($user);
            return redirect(route('admin.login'))->with('message', 'Succesfully Registered!');
        } else {
            return redirect()->back()->with('error', 'Error occured!');
        }
    }
    function reset()
    {
        return view('auth.reset');
    }
}
