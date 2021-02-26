<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminBeritaAcaraController extends Controller
{
    public function index()
    {
        return view('admin.pages.berita-acara');
    }
    
    public function create()
    {
        return view('admin.pages.bap-create');

    }
}
