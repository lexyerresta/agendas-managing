<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(Request $request)
    {
        $user = auth()->user();
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        if ($start_date && $end_date) {
            $end_date = Carbon::parse($end_date)->addDays(1);
            if ($user->level_user === 'admin') {
                $articles = Article::where('status', true)
                    ->whereBetween('created_at', [$start_date, $end_date])
                    ->get();
            } else {
                $articles = Article::where('user_id', $user->id)
                    ->where('status', true)
                    ->whereBetween('created_at', [$start_date, $end_date])
                    ->get();
            }
        } else if ($start_date) {
            if ($user->level_user === 'admin') {
                $articles = Article::where('status', true)
                    ->whereDate('created_at', $start_date)
                    ->get();
            } else {
                $articles = Article::where('user_id', $user->id)
                    ->where('status', true)
                    ->whereDate('created_at', $start_date)
                    ->get();
            }
        } else {
            if ($user->level_user === 'admin') {
                $articles = Article::where('status', true)->get();
            } else {
                $articles = Article::where('user_id', $user->id)
                    ->where('status', true)
                    ->get();
            }
        }

        return view('dashboard.articles.index', ['articles' => $articles]);
    }

     public function indexarchive(Request $request)
     {
         $user = auth()->user();
         $start_date = $request->input('start_date');
         $end_date = $request->input('end_date');
     
         if ($start_date && $end_date) {
             $end_date = Carbon::parse($end_date)->addDays(1);
             if ($user->level_user === 'admin') {
                 $articles = Article::where('status', false)
                     ->whereBetween('created_at', [$start_date, $end_date])
                     ->get();
             } else {
                 $articles = Article::where('user_id', $user->id)
                     ->where('status', false)
                     ->whereBetween('created_at', [$start_date, $end_date])
                     ->get();
             }
         } else if ($start_date) {
             if ($user->level_user === 'admin') {
                 $articles = Article::where('status', false)
                     ->whereDate('created_at', $start_date)
                     ->get();
             } else {
                 $articles = Article::where('user_id', $user->id)
                     ->where('status', false)
                     ->whereDate('created_at', $start_date)
                     ->get();
             }
         } else {
             if ($user->level_user === 'admin') {
                 $articles = Article::where('status', false)->get();
             } else {
                 $articles = Article::where('user_id', $user->id)
                     ->where('status', false)
                     ->get();
             }
         }
     
         return view('dashboard.articles.archive', ['articles' => $articles]);
     }     
     
     public function archive($slug)
     {
         $article = Article::where('slug', $slug)->firstOrFail();
         $article->status = false;
         $article->save();
     
         return redirect('/dashboard/articles')->with('success', 'Artikel berhasil diarsipkan.');
     }
     
     public function publish($slug)
     {
         $article = Article::where('slug', $slug)->firstOrFail();
         $article->status = true;
         $article->save();
     
         return redirect('/dashboard/articles')->with('success', 'Artikel berhasil dipublish kembali.');
     }
     
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.articles.create', [
            'categories' => Category::all()
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
            'title' => 'required|max:255',
            'slug' => 'required|unique:articles',
            'category_id' => 'required',
            'image' => 'image|file|max:7168',
            'body' => 'required'
        ]);

        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Article::create($validatedData);

        return redirect('/dashboard/articles')->with('success', 'Artikel baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('dashboard.articles.show', [
            'article' => $article
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('dashboard.articles.edit', [
            'article' => $article,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $rules = [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'image' => 'image|file|max:7168',
            'body' => 'required'
        ];

        if($request->slug != $article->slug) {
            $rules['slug'] = 'required|unique:articles';
        }

        $validatedData = $request->validate($rules);

        if($request->file('image')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Article::where('id', $article->id)
                ->update($validatedData);

        return redirect('/dashboard/articles')->with('success', 'Artikel berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        if($article->image) {
            Storage::delete($article->image);
        }
        Article::destroy($article->id);
        return redirect('/dashboard/articles')->with('success', 'Artikel telah dihapus!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Article::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
