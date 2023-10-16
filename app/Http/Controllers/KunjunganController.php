<?php

namespace App\Http\Controllers;

use App\Models\Kunjungan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class KunjunganController extends Controller
{
    public function kunjungan()
    {
        return view('kunjungan', [
            "title" => "Kunjungan",
            "active" => "kunjungan"
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'waktu_kunjungan' => 'required|date|after_or_equal:tomorrow', // Memastikan waktu_kunjungan adalah setelah atau sama dengan H+1 hari ini
            'keperluan' => 'required|max:255',
            'asal' => 'required|max:255',
            'no_hp' => 'required|numeric|digits_between:10,13'
        ]);

        // Mengambil ID user yang sedang login
        $user_id = Auth::id();
    
        // Menambahkan ID user ke dalam validated data
        $validatedData['user_id'] = $user_id;
    
        Kunjungan::create($validatedData);
    
        return redirect('/kunjungan')->with('success', 'Permintaan kunjungan berhasil diajukan!');
    }

    public function status()
    {
        $user = auth()->user();

        $kunjungans = Kunjungan::where('user_id', $user->id)->get();

        return view('kunjungan-status', [
            'kunjungans' => $kunjungans,
            'title' => "Kunjungan",
            'active' => "kunjungan"
        ]);
    }
}
