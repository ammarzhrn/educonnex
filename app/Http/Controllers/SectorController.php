<?php

namespace App\Http\Controllers;

use App\Models\Sector;
use Carbon\Carbon;
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

        $sector = new Sector();
        $sector->name = $request->name;
        $sector->description = $request->description;

        // Handle the thumbnail upload
        if ($request->hasFile('thumbnail')) {
            $thumb = $request->file('thumbnail');
            $extension = $thumb->getClientOriginalExtension();
            $path_dest = 'public/images/thumbnails';
            $name = 'thumbnail-' . Carbon::now()->format('Ymdhis') . '.' . $extension;
            $thumb->storeAs($path_dest, $name);
            $sector->thumbnail = $name;
        } else {
            $sector->thumbnail = 'images/thumbnail.png'; // Default thumbnail
        }

        $sector->save();

        return redirect()->route('sector.index')->with('success', 'Sector created successfully!');
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
            'name' => 'required|max:50',
            'description' => 'required|min:18|max:256',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $sector->name = $request->name;
        $sector->description = $request->description;

        // Check if a new thumbnail was uploaded
        if ($request->hasFile('thumbnail')) {
            $thumb = $request->file('thumbnail');
            $extension = $thumb->getClientOriginalExtension();
            $path_dest = 'public/images/thumbnails';
            $name = 'thumbnail-' . Carbon::now()->format('Ymdhis') . '.' . $extension;
            $thumb->storeAs($path_dest, $name);
            $sector->thumbnail = $name;
        }

        $sector->save();

        return redirect()->route('sector.index')->with('success', 'Sector updated successfully!');
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
