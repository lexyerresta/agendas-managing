<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('level_user', '!=', 'admin')->get();
        return view('dashboard.users.index', compact('users'));
    }    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::select('id', 'level_user')
                    ->where('level_user', '!=', 'eksternal')
                    ->distinct()
                    ->get()
                    ->unique('level_user');
        return view('dashboard.users.create', [
            'divisions' => Division::all(),
            'users' => $user
        ]);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|unique:users|max:255',
            'email' => 'required|email|unique:users|max:255',
            'division_id' => 'required',
            'level_user' => 'required',
            'password' => 'required|min:6|confirmed'
        ]);
    
        $validatedData['password'] = Hash::make($validatedData['password']);
    
        User::create($validatedData);
    
        return redirect('/dashboard/users')->with('success', 'User baru berhasil ditambahkan!');
    }    
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $divisions = Division::all();

        return view('dashboard.users.edit', [
            'user' => $user,
            'divisions' => $divisions,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'division' => 'required|exists:divisions,id',
            'level_user' => 'required|in:admin,staff',
            'password' => 'nullable|string|min:6|confirmed',
            'password_confirmation' => 'nullable'
        ]);
    
        $user = User::findOrFail($id);
    
        // periksa apakah password yang dimasukkan sama dengan password admin yang sedang login
        if ($request->filled('password') && !Hash::check($request->password, Auth::user()->password)) {
            return redirect()->back()->withErrors(['password' => 'Password salah.'])->withInput();
        }
    
        $user->name = $request->name;
        $user->division_id = $request->division;
        $user->level_user = $request->level_user;
    
        if ($request->filled('password_confirmation')) {
            $user->password = bcrypt($request->password_confirmation);
        }
    
        $user->save();
    
        return redirect('/dashboard/users')->with('success', 'User berhasil diubah!');
    }     

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);
        return redirect('/dashboard/users')->with('success', 'User telah dihapus!');
    }

    public function unactive($id)
    {
        $users = User::where('id', $id)->firstOrFail();
        $users->status = false;
        $users->save();
        
        return redirect('/dashboard/users')->with('success', 'User berhasil dinonaktifkan.');
    }
    
    public function active($id)
    {
        $users = User::where('id', $id)->firstOrFail();
        $users->status = true;
        $users->save();
    
        return redirect('/dashboard/users')->with('success', 'User berhasil diaktifkan kembali.');
    }
}
