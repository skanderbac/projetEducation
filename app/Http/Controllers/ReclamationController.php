<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReclamationController extends Controller
{
    public function index()
    {
        return view('reclamation.index');
    }

    public function mesreclamations()
    {
        return view('reclamation.mesreclamations');
    }
    public function create()
    {
        return view('reclamation.create');
    }
    public function update()
    {
        return view('reclamation.update');
    }
}
