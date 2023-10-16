<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardProfilBNNPController extends Controller
{
    public function edit(Profil $profil)
    {
        $profil = Profil::first();
        $user = Auth::user();
    
        return view('dashboard.profil.edit', compact('user', 'profil'));
    }

    public function update(Request $request, $id)
    {
        $profil = Profil::where('id', $id)->first();
    
        $validatedData = $request->validate([
            'judul_profil' => [
                'required'
            ],
            'isi_profil' => [
                'required'
            ]
        ]);
    
        $profil->update($validatedData);
    
        return redirect()->route('dashboard.index')->with('success', 'Profil BNNP Bali berhasil diubah!');
    }
}
