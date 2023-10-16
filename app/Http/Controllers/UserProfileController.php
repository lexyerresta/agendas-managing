<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('detail_user.index', ["title" => "User Profile", "active" => "userprofile"], compact('user'));
    }

    public function edit()
    {
        $divisions = Division::all();
        $user = Auth::user();
    
        // return view('detail_user.edit', compact('user', 'divisions'));
        return view('detail_user.edit', ["title" => "Edit Profile", "active" => "editprofile"], compact('user','divisions'));
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
    
        return redirect()->route('userprofile.index')->with('success', 'Profil berhasil diupdate!');
    }
    
    public function editPassword()
    {
        $user = Auth::user();
    
        // return view('detail_user.edit_password', compact('user'));
        return view('detail_user.edit_password', ["title" => "Change Password", "active" => "changepassword"], compact('user'));

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
    
        return redirect()->route('userprofile.index')->with('success', 'Password berhasil diubah!');
    }
}
