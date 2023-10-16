<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;



class DashboardProfileController extends Controller
{
    // public function index()
    // {
    //     $user = auth()->user();
    //     $users = User::all();

    //     return view('dashboard.users.detail', compact('users'));
    // }
    public function index()
    {
        $user = auth()->user();
        return view('dashboard.detail_user.index', compact('user'));
    }

    public function edit()
    {
        $divisions = Division::all();
        $user = Auth::user();
    
        return view('dashboard.detail_user.edit', compact('user', 'divisions'));
    }

    public function update(Request $request, $id)
    {
        $user = User::where('id', $id)->first();
    
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'username' => [
                'required',
                Rule::unique('users')->ignore($user),
                'alpha_num',
                'min:3',
                'max:25'
            ],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user)
            ]
        ]);
    
        $user->update($validatedData);
    
        return redirect()->route('profile.index')->with('success', 'Profil berhasil diupdate!');
    }
    
    public function editPassword()
    {
        $user = Auth::user();
    
        return view('dashboard.detail_user.edit_password', compact('user'));
    }

    public function updatePassword(Request $request, $id)
    {
        $user = User::where('id', $id)->first();
    
        $validatedData = $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed|min:6',
        ], [
            'password.confirmed' => 'Password konfirmasi tidak cocok.',
        ]);
        
        if (!Hash::check($validatedData['current_password'], $user->password)) {
            return back()->withErrors(['current_password' => 'Kata sandi yang diberikan tidak cocok dengan kata sandi Anda saat ini.']);
        }        
    
        $user->password = Hash::make($validatedData['password']);
        $user->save();
    
        return redirect()->route('profile.index')->with('success', 'Password berhasil diubah!');
    }
}
