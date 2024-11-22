<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class PublicHomeController extends Controller
{
    public function index()
    {
        // Ambil 3 program terbaru berdasarkan kolom created_at
        $program = Program::latest()->take(3)->get();

        // Kirim data ke view
        return view('public.home.index', compact('program'));
    }
}

