<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller {
    public function index()
    {
        return view('index');
    }
    public function home()
    {
        return view('home');
    }

    public function admin()
    {
        return view('admin.adminpage');
    }   
}
