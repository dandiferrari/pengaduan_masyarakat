<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class PengaduanController extends Controller
{
    public function create()
    {
        return Inertia::render('Pengaduan/Form');
    }
}
