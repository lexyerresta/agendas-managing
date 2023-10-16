<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $title = '';
        if(request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' dalam kategori ' . $category->name;
        }

        if(request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = ' dari ' . $author->name;
        }
        
        $articles = Article::where('status', true)
        ->latest()
        ->filter(request(['search', 'category', 'author']))
        ->paginate(7)
        ->withQueryString();

        return view('beranda', [
        "title" => "Semua artikel" . $title,
        "active" => 'beranda',
        "articles" => $articles
        ]);

        }

    public function tampil(Article $satu_pos_penuh)
    {
        return view('artikel', [
            "title" => "Artikel",
            "active" => 'beranda',
            "article" => $satu_pos_penuh
        ]);
    }
}
