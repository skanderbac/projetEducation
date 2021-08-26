<?php

namespace App\Http\Controllers;

use App\Models\Matiere;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::join('users', 'users.id', '=', 'teachers.user_id')->where('users.role','Enseignant')->orderBy('users.name','asc')->paginate(10);
        return view('teachers.index',compact('teachers'));
    }

    public function create()
    {
        $matieres =  Matiere::all();
        return view('teachers.create',compact('matieres'));
    }

    public function store(Request $request)
    {
        $request->validate([
            "nom"=>"required",
            "prenom"=>"required",
            "email"=>"required",
            "mdp"=>"required",
            "bac_id"=>"required",
        ]);
        User::create($request->all());
        Teacher::create();
        return redirect('/students')->with("success","Enseignant ajouté");
    }
}
