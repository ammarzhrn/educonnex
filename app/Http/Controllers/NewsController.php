<?php

namespace App\Http\Controllers;

use App\Models\News;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $sortRole = $request->input('sort_role');
        $user = Auth::user();

        $query = $user->role === 'superAdmin' ? News::query() : News::where('id_user', $user->id);

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('article', 'like', "%{$search}%");
            });
        }

        if ($sortRole) {
            $query->where('status', $sortRole);
        }

        $news = $query->paginate(10);

        return view('admin.news.index', compact('news', 'search', 'sortRole'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.news.create');
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

        $news = new News();
        $news->id_user = Auth::id();
        $news->title = $request->title;
        $news->article = $request->article;
        $news->category = json_encode($request->category);


        if($request->hasFile('thumbnail'))
        {
            $thumb = $request->file('thumbnail');
            $extension = $thumb->getClientOriginalExtension();
            $path_dest = 'public/images/thumbnails';
            $name = 'thumbnail-'.Carbon::now()->format('Ymdhis').'.'.$extension;
            $path = $request->file('thumbnail')->storeAs($path_dest, $name);
            $news->thumbnail = $name;
        }

        $news->save();

        return redirect()->route('news.index')->with('success', 'Article Requested successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $news = News::findOrFail($id);

        return view('admin.news.detail', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $news = News::findOrFail($id);

        return view('admin.news.edit', compact('news'));
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

    $news = News::findOrFail($id);
    $news->title = $request->title;
    $news->article = $request->article;
    $news->category = json_encode($request->category);

    if ($request->hasFile('thumbnail')) {
        $thumb = $request->file('thumbnail');
        $extension = $thumb->getClientOriginalExtension();
        $path_dest = 'public/images/thumbnails';
        $name = 'thumbnail-' . Carbon::now()->format('Ymdhis') . '.' . $extension;
        $path = $request->file('thumbnail')->storeAs($path_dest, $name);
        $news->thumbnail = $name;
    }

    $news->save();

    return redirect()->route('news.index')->with('success', 'News updated successfully!');
}

    public function updateStatus($id, $status)
    {
        $news = News::findOrFail($id);

        if (in_array($status, ['reject', 'published'])) {
            $news->status = $status;
            $news->save();

            $message = $status === 'reject' ? 'Article has been rejected!' : 'Article has been published!';

            return redirect()->route('news.show', $id)->with('success', $message);
        }

        return redirect()->route('news.show', $id)->with('error', 'Invalid status update.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('news.index')->with('success', 'News deleted successfully');
    }
}
