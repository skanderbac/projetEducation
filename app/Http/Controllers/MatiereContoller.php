<?php

namespace App\Http\Controllers;

use App\Models\Bac;
use App\Models\Cour;
use App\Models\Matiere;
use App\Models\Piece;
use App\Models\Student;
use App\Models\Support;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MatiereContoller extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        $bac_id=0;
        $liste=Student::where('students.user_id','=',auth()->user()->id)->get();
        $blocked=0;
        foreach ($liste as $item){
            $bac_id = $item->bac_id;
            $blocked=$item->blocked;
        }
        $bac= Bac::where('id','=',$bac_id)->get();
        $matieres= Matiere::join('matiere_bac','matiere_bac.matiere_id','=','matieres.id')
            ->where('bac_id','=',$bac_id)
            ->get();

        if($blocked==1){
            return redirect('/');
        }
        return view('matiere.index',compact('matieres','bac','blocked'));
    }

    public function all()
    {
        $bac_id=0;
        $liste=Student::where('students.user_id','=',auth()->user()->id)->get();
        foreach ($liste as $item){
            $bac_id = $item->bac_id;
        }
        $matieres= Matiere::join('matiere_bac','matiere_bac.matiere_id','=','matieres.id')
            ->where('bac_id','=',$bac_id)
            ->get();
        return $matieres;
    }
    public function cours($matiere_bac_id)
    {
        if(auth()->user()->role=='Admin'){
            $cours= DB::table('cours')
                ->select('cours.id','cours.titre')
                ->join('matiere_bac','matiere_bac.id','=','cours.matiere_bac_id')
                ->where('matiere_bac.id','=',$matiere_bac_id)
                ->get();

            $matiere = Matiere::join('matiere_bac','matiere_bac.matiere_id','=','matieres.id')
                ->where('matiere_bac.id','=',$matiere_bac_id)
                ->get();
            $bac = Bac::join('matiere_bac','matiere_bac.bac_id','=','bacs.id')
                ->where('matiere_bac.id','=',$matiere_bac_id)
                ->get();
            return view('bac.cours',compact('cours','matiere','matiere_bac_id','bac'));
        }
        else{
            return redirect('/')->with("alert","vous n'avez pas la permission pour cette page");
        }
    }

    public function createcours($matiere_bac_id)
    {
        if(auth()->user()->role=='Admin'){
            $matiere = Matiere::join('matiere_bac','matiere_bac.matiere_id','=','matieres.id')
                ->where('matiere_bac.id','=',$matiere_bac_id)
                ->get();
            $bac = Bac::join('matiere_bac','matiere_bac.bac_id','=','bacs.id')
                ->where('matiere_bac.id','=',$matiere_bac_id)
                ->get();
            return view('bac.courscreate',compact('matiere','matiere_bac_id','bac'));
        }
        else{
            return redirect('/')->with("alert","vous n'avez pas la permission pour cette page");
        }
    }

    public function storecours(Request $request)
    {
        $request->validate([
           'titre'=>'required',
           'matiere_bac_id'=>'required'
        ]);
        Cour::create(['titre'=>$request->get('titre'),'matiere_bac_id'=>$request->get('matiere_bac_id')]);
        return redirect('/admin/bac/matieres/'.$request->get('matiere_bac_id'))->with("success","cours ajouté");
    }

    public function destroy(Cour $cours,$matiere_bac_id)
    {
        $supports= Support::where('cours_id','=',$cours->id)->get();
        foreach ($supports as $item) {
            $pieces=Piece::where('support_id','=',$item->id)->get();
            foreach ($pieces as $piece) {
                $piece->delete();
            }
            $item->delete();
        }

        $cours->delete();
        $nom = $cours->titre;
        return redirect('/admin/bac/matieres/'.$matiere_bac_id)->with("success","Le cours '$nom' a été supprimé");
    }

    public function editcours(Cour $cours)
    {
        if(auth()->user()->role=='Admin'){
            $cours=Cour::find($cours);
            return view('bac.coursedit',compact('cours'));
        }
        else{
            return redirect('/')->with("alert","vous n'avez pas la permission pour cette page");
        }
    }

    public function updatecours(Request $request, Cour $cours)
    {

        $request->validate([
            "cours_id"=>"required",
            "titre"=>"required",
        ]);

        $cours->update([
            "titre" => $request->titre,
        ]);
        return redirect('/admin/bac/matieres/'.$request->get('matiere_bac_id'))->with("success","Le cours a été modifié");
    }
}
