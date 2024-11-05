<?php

namespace App\Http\Controllers;

use App\Models\Sector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SectorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sectors = Sector::query()
    ->when($request->filled('name'), function ($query) use ($request) {
        return $query->where('name', 'like', '%' . $request->input('name') . '%');
    })
    ->orderBy('created_at', 'desc') // Primary order: Newest first
    ->paginate(10);

        return view('admin.sector.index', compact('sectors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sector.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'description' => 'required|min:18|max:256',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->only('name', 'description');

        // Handle the thumbnail upload or set default path
        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('thumbnail', 'public');
        } else {
            $data['thumbnail'] = 'images/thumbnail.png';
        }

        Sector::create($data);

        return redirect()->route('sector.index')->with('success', 'Sector created successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $sector =  Sector::findOrFail($id);
        return view('admin.sector.detail', compact('sector'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $sector =  Sector::findOrFail($id);
        return view('admin.sector.edit', compact('sector'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sector $sector)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->only('name', 'description');

        // Check if a new thumbnail was uploaded
        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        } else {
            // Keep the existing thumbnail or set default if empty
            $data['thumbnail'] = $sector->thumbnail ?? 'images/thumbnail.png';
        }

        $sector->update($data);

        return redirect()->route('sector.index')->with('success', 'Sector updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sector $sector)
    {
        $sector->delete();

        return redirect()->route('sector.index')->with('success', 'Sector deleted successfully');
    }
}
