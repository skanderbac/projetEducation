<?php

namespace App\Http\Controllers;

use App\Models\Bac;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function index()
    {
        $students = Student::join('users', 'users.id', '=', 'students.user_id')->where('users.role','Eleve')->orderBy('users.name','asc')->paginate(10);
        return view('students.index',compact('students'));
    }


    public function create()
    {
        $bac =  Bac::all();
        return view('students.create',compact('bac'));
    }


    public function store(Request $request)
    {
        $request->validate([
            "user_id"=>"required",
            "bac_id"=>"required",
        ]);
        Student::create($request->all());
        return redirect('/')->with("success","Vous avez choisie votre bac avec succés");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    public function edit(Student $student)
    {
        $bac =  Bac::all();
        return view('students.edit',compact('student','bac'));
    }


    public function update(Request $request, Student $student)
    {
        $request->validate([
            "nom"=>"required",
            "prenom"=>"required",
            "email"=>"required",
            "mdp"=>"required",
            "bac_id"=>"required",
        ]);
        $student->update([
            "nom" => $request->nom,
            "prenom" => $request->prenom,
            "email"=>$request->email,
            "mdp"=>$request->mdp,
            "bac_id" => $request->bac_id,
        ]);
        //return back()->with("success","Etudiant modifié");
        return redirect('/students')->with("success","Etudiant modifié");
    }


    public function destroy(Student $student)
    {
        $student->delete();
        $nom = $student->user->name;
        return back()->with("success","Etudiant nomé '$nom' supprimé");
    }
}
