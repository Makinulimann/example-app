<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;  
use Illuminate\Support\Facades\Auth; 

class AuthController extends Controller
{
    public function registration(){
        return view('auth.registration');
    }
    public function registrationPost(Request $request){
        $request->validate([
            'name' => 'required|max:255',
            'email'=> 'required|unique:users|email',
            'password'=>'required|min:6'
        ]);
        User ::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => ($request->password)]);
            return redirect()->route('login');
    }
    public function login(){
        return view('auth.login');
    }

    public function loginPost(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            $request->session()->put('user', $user);

            if ($user->role == 'admin') {
                return redirect()->route('adminpage');  
            } else {
                return redirect()->route('home');
            }
        } else {
            return back()->withErrors([
                'email' => 'Email atau password salah.',
            ])->withInput($request->except('password'));
        }
    }
    public function logout() {
        Auth::logout();
        session()->flush();
        return redirect()->route('index');
    }
}
