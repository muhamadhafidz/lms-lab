<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdminProfilController extends Controller
{
    public function index()
    {
        $data = User::with('kelas')->first();
        return view('admin.pages.profil.index', [
            'data' => $data
        ]);
    }
}
