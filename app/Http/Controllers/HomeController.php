<?php

namespace App\Http\Controllers;

use App\Models\Bac;
use App\Models\Matiere;
use App\Models\Piece;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }


    public function index()
    {
        if(auth()->user()){
            if(auth()->user()->role=="Eleve"){
                $bac= Bac::all();
                $matiere= Matiere::where('type','=','Option')->get();
                $confirmed=0;

                $liste = Student::where('user_id','=',auth()->user()->id)->get();
                $blocked=0;
                foreach ($liste as $item){
                    $confirmed++;
                    $blocked=$item->blocked;
                }
                $b=Bac::join('students','students.bac_id','=','bacs.id')
                    ->where('students.user_id','=',auth()->user()->id)
                    ->first();
                return view('welcome',compact('bac','matiere','confirmed','b','blocked'));
            }
            else if(auth()->user()->role=="Enseignant"){
                $matiere= Matiere::all();
                $confirmed=0;

                $liste = Teacher::where('user_id','=',auth()->user()->id)->get();
                foreach ($liste as $item){
                    $confirmed++;
                }
                $m=Matiere::join('teachers','teachers.matiere_id','=','matieres.id')
                    ->where('teachers.user_id','=',auth()->user()->id)
                    ->first();
                return view('welcome',compact('matiere','confirmed','m'));
            }
            else{
                return redirect('/admin/bacs');
            }

        }
        else{
            return view('welcome');
        }

    }


    public function photoedit(Request $request){
        $request->validate([
            'photo'=>'required'
        ]);

        $file=$request->file('photo');
        $name = time().rand(1,100).'.'.$file->extension();
        $file->move(public_path('photos'), $name);
        auth()->user()->update([
            'photo'=>$name
        ]);


        return redirect('/');
    }

    public function edit(){
        if(auth()->user()->role =='Eleve'){
            $student=Student::where('user_id','=',auth()->user()->id)->first();
            $bac=Bac::all();
            return view('auth.editprofile',compact('student','bac'));
        }
        else{
            $teacher=Teacher::where('user_id','=',auth()->user()->id)->first();
            $matiere=Matiere::all();
            return view('auth.editprofile',compact('teacher','matiere'));
        }

    }
    public function update(Request $request){
        $request->validate([
            'email'=>'required',
            'name'=>'required',
        ]);
        auth()->user()->update([
            'email'=>$request->get('email'),
            'name'=>$request->get('name'),
        ]);

        if(auth()->user()->role=='Eleve'){
            $student=Student::where('user_id','=',auth()->user()->id)->first();
            $student->update([
                'bac_id'=>$request->get('bac_id')
            ]);
        }
        else if(auth()->user()->role=='Enseignant'){
            $teacher=Teacher::where('user_id','=',auth()->user()->id)->first();
            $teacher->update([
                'matiere_id'=>$request->get('matiere_id')
            ]);
        }

        return redirect('/');
    }
}
