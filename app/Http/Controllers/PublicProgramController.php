<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Sector;
use Illuminate\Http\Request;

class PublicProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programs = Program::all();
        $sectors = Sector::all();
        return view('public.program.index', compact('programs', 'sectors'));
    }

    public function listBySector($sectorId)
    {
        // Ambil data sektor
        $sectors = Sector::findOrFail($sectorId);

        // Ambil program berdasarkan sektor
        $programs = Program::where('id_sector', $sectorId)->get();

        // Tampilkan halaman dengan data program dan sektor
        return view('public.program.list', compact('sectors', 'programs'));
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
