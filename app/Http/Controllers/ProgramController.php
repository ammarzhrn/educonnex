<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Sector;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $programsQuery = Program::query()
            ->when($request->filled('name'), function ($query) use ($request) {
                $query->where('title', 'like', "%{$request->input('name')}%");
            })
            ->orderByDesc('created_at');

        $programs = $programsQuery->paginate(10);

        return view('admin.program.index', compact('programs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sectors = Sector::all();
        return view('admin.program.create', compact('sectors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_sector' => 'required|exists:sectors,id',
            'title' => 'required|string|max:50',
            'description' => 'required|string',
            'proposal' => 'required|string',
            'contact' => 'required|string|max:255',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        $program = new Program($validatedData);

        if ($request->hasFile('thumbnail')) {
            $program->thumbnail = $request->file('thumbnail')->store('thumbnails', 'public');
        } else {
            $program->thumbnail = 'images/thumbnail.png';
        }

        $program->save();

        return redirect()->route('programs.index')->with('success', 'Program created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $program = Program::findOrFail($id);
        return view('admin.program.detail', compact('program',));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $program = Program::findOrFail($id);
        $sectors = Sector::all();
        return view('admin.program.edit', compact('program', 'sectors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Program $program)
    {
        $request->validate([
            'id_sector' => 'required|exists:sectors,id',
            'title' => 'required|string|max:50',
            'description' => 'required|string',
            'proposal' => 'required|string',
            'contact' => 'required|string|max:255',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        $program->update([
            'id_sector' => $request->id_sector,
            'title' => $request->title,
            'description' => $request->description,
            'proposal' => $request->proposal,
            'contact' => $request->contact,
            'thumbnail' => $request->hasFile('thumbnail')
                ? $request->file('thumbnail')->store('thumbnail', 'public')
                : $program->thumbnail,
        ]);

        return redirect()->route('programs.index')->with('success', 'Program updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Program $program)
    {
        $program->delete();

        return redirect()->route('programs.index')->with('success', 'Sector deleted successfully');
    }
}
