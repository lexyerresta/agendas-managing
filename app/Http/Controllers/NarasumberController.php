<?php

namespace App\Http\Controllers;

use App\Models\Narasumber;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class NarasumberController extends Controller
{
    public function narasumber()
    {
        return view('narasumber', [
            "title" => "Narasumber",
            "active" => "narasumber"
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'tanggal_acara' => 'required|date|after_or_equal:tomorrow', // Memastikan tanggal_acara adalah setelah atau sama dengan H+1 hari ini
            'tempat' => 'required|max:255',
            'asal' => 'required|max:255',
            'no_hp' => 'required|numeric|digits_between:10,13'
        ]);
    
        // Mengambil ID user yang sedang login
        $user_id = Auth::id();
    
        // Menambahkan ID user ke dalam validated data
        $validatedData['user_id'] = $user_id;
    
        Narasumber::create($validatedData);
    
        return redirect('/narasumber')->with('success', 'Permintaan narasumber berhasil diajukan!');
    }    
    
    public function status()
    {
        $user = auth()->user();

        $narasumbers = Narasumber::where('user_id', $user->id)->get();

        return view('narasumber-status', [
            'narasumbers' => $narasumbers,
            'title' => "Narasumber",
            'active' => "narasumber"
        ]);
    }
}
