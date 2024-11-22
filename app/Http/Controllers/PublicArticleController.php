<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class PublicArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $search = $request->input('search');
    $articles = Article::query();

    if ($search) {
        $articles->where(function ($query) use ($search) {
            $query->where('title', 'like', "%{$search}%")
                  ->orWhere('article', 'like', "%{$search}%");
        });
    }

    $articles = $articles->paginate(10);

    return view('public.article.index', compact('articles', 'search'));
}



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $article = Article::findOrFail($id);

        $otherArticles = Article::where('id', '!=', $id)
        ->latest() // Atur urutan berdasarkan artikel terbaru
        ->take(5)  // Batasi jumlah artikel lainnya, misalnya 5
        ->get();

        return view('public.article.detail', compact('article', 'otherArticles'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
