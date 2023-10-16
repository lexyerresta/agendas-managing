<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category()
    {
        return view('categories', [
            'title' => 'Kategori',
            'active' => 'categories',
            'categories' => Category::all()
        ]);
    }
}
