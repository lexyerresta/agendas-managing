<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'title' => 'Login',
            'active' => 'login'
        ]);
    }

    // public function login(Request $request)
    // {
    //      $credentials = $request->validate(([
    //         'email' => 'required|email',
    //         'password' => 'required'
    //      ]));
    
    //      if(Auth::attempt($credentials)) {
    //         $request->session()->regenerate();
    
    //         return redirect()->intended('/');
    //      }
    
    //      return back()->with('loginError', 'Login gagal!');
    // }

    // public function login(Request $request)
    // {
    //     $credentials = $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required'
    //     ]);
    
    //     if (Auth::attempt($credentials)) {
    //         $request->session()->regenerate();
            
    //         $levelUser = Auth::user()->level_user;
    
    //         if ($levelUser === 'admin' || $levelUser === 'staff') {
    //             return redirect()->intended('/dashboard');
    //         } elseif ($levelUser === 'eksternal') {
    //             return redirect()->intended('/');
    //         }
    //     }
    
    //     return back()->with('loginError', 'Login gagal!');
    // }
    
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
    
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            $user = Auth::user();
            $levelUser = $user->level_user;
    
            if ($user->status) {
                if ($levelUser === 'admin' || $levelUser === 'staff') {
                    return redirect()->intended('/dashboard');
                } elseif ($levelUser === 'eksternal') {
                    return redirect()->intended('/');
                }
            } else {
                Auth::logout();
                return back()->with('loginError', 'Status user anda dinonaktifkan, silahkan hubungi Administrator');
            }
        }
    
        return back()->with('loginError', 'Login gagal!');
    }    

    public function logout()
    {
        Auth::logout();
 
        request()->session()->invalidate();
    
        request()->session()->regenerateToken();
    
        return redirect('/');
    }
}
