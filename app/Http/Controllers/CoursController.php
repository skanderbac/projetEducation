<?php

namespace App\Http\Controllers;

use App\Models\Avi;
use App\Models\Bac;
use App\Models\Cour;
use App\Models\Matiere;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CoursController extends Controller
{
    public function index($matiere_id)
    {
        $bac_id=0;
        $liste=Student::where('students.user_id','=',auth()->user()->id)->get();
        foreach ($liste as $item){
            $bac_id = $item->bac_id;
        }
        $matiere_bac=DB::table('matiere_bac')
            ->where('matiere_bac.bac_id','=',$bac_id)
            ->where('matiere_bac.matiere_id','=',$matiere_id)
            ->get();
        $cours=[];
        foreach ($matiere_bac as $item) {
            $cours= Cour::with('Supports','Supports.teacher.user','Supports.Pieces')
                ->where('matiere_bac_id','=',$item->id)
                ->get();
        }
        $matiere =Matiere::join('matiere_bac','matiere_bac.matiere_id','=','matieres.id')
            ->where('matiere_bac.id','=',$matiere_id)->get();

        $avis=Avi::where('user_id','=',auth()->user()->id)->get();
        $test=0;
        foreach ($avis as $a) {
            $test++;
        }

        return view('cours.index',compact('cours','matiere','test'));
        //return $cours;
    }
    public function create()
    {
        $bac =  Bac::all();
        $matiere_id=0;
        $teacher=Teacher::where('user_id','=',auth()->user()->id)->get();
        foreach ($teacher as $item){
            $matiere_id = $item->matiere_id;
        }
        $matiere =  Matiere::where('id','=',$matiere_id)->get();
        return view('cours.create',compact('bac','matiere','teacher'));
    }
    public function all($matiere_id)
    {

        $bac_id=0;
        $liste=Student::where('students.user_id','=',auth()->user()->id)->get();
        foreach ($liste as $item){
            $bac_id = $item->bac_id;
        }
        $cours= Cour::with('Supports.teacher.user','Supports.Pieces')
            ->join('matiere_bac','matiere_bac.id','=','cours.matiere_bac_id')
            ->where('bac_id','=',$bac_id)
            ->where('matiere_id','=',$matiere_id)
            ->get();
        return $cours;
    }

    public function matierescours(Request $request)
    {
        $matiere_id=0;
        $liste=Teacher::where('user_id','=',auth()->user()->id)->get();
        foreach ($liste as $item){
            $matiere_id = $item->matiere_id;
        }
        $cours= Cour::select('cours.id','cours.titre')
            ->join('matiere_bac','matiere_bac.id','=','cours.matiere_bac_id')
            ->where('bac_id','=',$request->get('bac_id'))
            ->where('bac_id','=',$request->get('bac_id'))
            ->where('matiere_id','=',$matiere_id)
            ->get();
        return $cours;
    }

}
