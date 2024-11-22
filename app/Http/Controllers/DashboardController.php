<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\News;
use App\Models\Program;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $programs = Program::all();
        $news = News::all();
        $articles = Article::all();

        $publishedArc = Article::where('status', 'published')->count();
        $pendingArc = Article::where('status', 'pending')->count();
        $rejectedArc = Article::where('status', 'rejected')->count();

        $publishedNew = News::where('status', 'published')->count();
        $pendingNew = News::where('status', 'pending')->count();
        $rejectedNew = News::where('status', 'rejected')->count();

        $pendingArticles = Article::where('status', 'pending')
        ->orderBy('created_at', 'desc')
        ->take(5)
        ->get();

        $pendingNews = News::where('status', 'pending')
        ->orderBy('created_at', 'desc')
        ->take(5)
        ->get();

        return view('dashboard', compact('users', 'programs', 'news', 'articles', 'publishedArc', 'pendingArc', 'rejectedArc', 'publishedNew', 'pendingNew', 'rejectedNew', 'pendingArticles', 'pendingNews'));
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
    public function show(string $id)
    {
        //
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
