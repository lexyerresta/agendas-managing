<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function profil()
    {
        $profil = Profil::first();
        return view('profil', [
            "title" => "Profil",
            "active" => "profil",
            "name" => "BNN",
            "email" => "bnnpbali@gmail.com",
            "image" => "test.png",
            "profil" => $profil
        ]);
    }
}
