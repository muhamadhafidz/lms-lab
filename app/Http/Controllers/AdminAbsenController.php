<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminAbsenController extends Controller
{
    public function index()
    {
        return view('admin.pages.absen');
    }

    public function create($id)
    {
        return view('admin.pages.absen-create');
    }
}
