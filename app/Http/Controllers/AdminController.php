<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $data['users']=User::orderby('id','ASC')->paginate(7);
        return view('admin.users.list');
    }
}
