<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPraktikumController extends Controller
{
    public function index()
    {
        return view('admin.pages.praktikum');
    }
}
