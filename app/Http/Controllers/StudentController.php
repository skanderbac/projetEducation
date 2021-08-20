<?php

namespace App\Http\Controllers;

use App\Models\Bac;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function index()
    {
        $students = Student::orderBy('nom','asc')->paginate(10);
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
            "nom"=>"required",
            "prenom"=>"required",
            "bac_id"=>"required",
        ]);
        Student::create($request->all());
        //return back()->with("success","Etudiant ajouté");
        return redirect('/students')->with("success","Etudiant ajouté");
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
            "bac_id"=>"required",
        ]);
        $student->update([
            "nom" => $request->nom,
            "prenom" => $request->prenom,
            "bac_id" => $request->bac_id,
        ]);
        //return back()->with("success","Etudiant modifié");
        return redirect('/students')->with("success","Etudiant modifié");
    }


    public function destroy(Student $student)
    {
        $student->delete();
        return back()->with("success","Etudiant nomé '$student->nom' supprimé");
    }
}
