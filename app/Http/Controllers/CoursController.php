<?php

namespace App\Http\Controllers;

use App\Models\Bac;
use App\Models\Matiere;
use Illuminate\Http\Request;

class CoursController extends Controller
{
    public function index()
    {
        return view('cours.index');
    }
    public function create()
    {
        $bac =  Bac::all();
        $matiere =  Matiere::all();
        return view('cours.create',compact('bac','matiere'));
    }

}
