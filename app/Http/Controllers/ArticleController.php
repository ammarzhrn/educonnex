<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $sortRole = $request->input('sort_role');
        $user = Auth::user();

        $query = $user->role === 'superAdmin' ? Article::query() : Article::where('id_user', $user->id);

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('article', 'like', "%{$search}%");
            });
        }

        if ($sortRole) {
            $query->where('status', $sortRole);
        }

        $articles = $query->paginate(10);

        return view('admin.article.index', compact('articles', 'search', 'sortRole'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.article.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:50',
            'article' => 'required|string|min:10',
            'category' => 'required|array',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        $article = new Article();
        $article->id_user = Auth::id();
        $article->title = $request->title;
        $article->article = $request->article;
        $article->category = json_encode($request->category);

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('thumbnail', 'public');
        } else {
            $data['thumbnail'] = 'images/thumbnail.png';
        }

        $article->save();

        return redirect()->route('article.index')->with('success', 'Article Requested successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $article = Article::findOrFail($id);

        return view('admin.article.detail', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('admin.article.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:50',
            'article' => 'required|string|min:10',
            'category' => 'required|array',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        $article = Article::findOrFail($id);
        $article->title = $request->title;
        $article->article = $request->article;
        $article->category = json_encode($request->category);

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('thumbnail', 'public');
        } else {
            $data['thumbnail'] = 'images/thumbnail.png';
        }

        $article->save();

        return redirect()->route('article.index')->with('success', 'Article updated successfully!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateStatus($id, $status)
    {
        $article = Article::findOrFail($id);

        if (in_array($status, ['reject', 'published'])) {
            $article->status = $status;
            $article->save();

            $message = $status === 'reject' ? 'Article has been rejected!' : 'Article has been published!';

            return redirect()->route('article.show', $id)->with('success', $message);
        }

        return redirect()->route('article.show', $id)->with('error', 'Invalid status update.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('article.index')->with('success', 'Article deleted successfully');
    }
}
