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

class BacController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(){
        if(auth()->user()->role=='Admin'){
            $bac=Bac::all();
            return view('bac.index',compact('bac'));
        }
        else{
            return redirect('/')->with("alert","vous n'avez pas la permission pour cette page");
        }

    }

    public function bac($id){
        if(auth()->user()->role=='Admin'){
            $matieres=Matiere::join('matiere_bac','matiere_bac.matiere_id','=','matieres.id')
                ->where('matiere_bac.bac_id','=',$id)
                ->get();
            $bac=Bac::where('id','=',$id)->get();
            return view('bac.matieres',compact('matieres','bac','id'));
        }
        else{
            return redirect('/')->with("alert","vous n'avez pas la permission pour cette page");
        }
    }

    public function create($bac_id){
        if(auth()->user()->role=='Admin'){
            $matieres=Matiere::where('type','=','')->get();
            $liste=Matiere::join('matiere_bac','matiere_bac.matiere_id','=','matieres.id')
                ->where('matiere_bac.bac_id','=',$bac_id)
                ->get();
            $l=[];
            foreach ($matieres as $m){
                $test=0;
                foreach ($liste as $item){
                    if($m->nom==$item->nom){
                        $test++;
                    }
                }
                if($test==0){
                    array_push($l, $m);
                }
            }
            $matieres=$l;
            $bac=Bac::where('id','=',$bac_id)->get();
            return view('bac.add',compact('matieres','bac','bac_id'));
        }
        else{
            return redirect('/')->with("alert","vous n'avez pas la permission pour cette page");
        }

    }

    public function store(Request $request){
        $request->validate([
            'matiere_id'=>'required',
            'bac_id'=>'required'
        ]);

        $matiere=Matiere::where('id','=',$request->get('matiere_id'))->get();
        $bac=Bac::where('id','=',$request->get('bac_id'))->get();
        foreach ($matiere as $m){
            foreach ($bac as $item) {
                $m->Bacs()->attach($item);
            }
        }


        return redirect('/admin/bac/'.$request->get('bac_id'))->with("success","Matiere ajoutée avec succées");
    }

    public function showmatieres($matiere_bac_id){
        /*$cours= DB::table('cours')->join('matiere_bac','matiere_bac.id','=','cours.matiere_bac_id')
            ->where('matiere_bac.id','=',$matiere_bac_id)
            ->get();*/
        $cours= DB::table('cours')
            ->select('cours.id','cours.titre')
            ->join('matiere_bac','matiere_bac.id','=','cours.matiere_bac_id')
            ->where('matiere_bac.id','=',$matiere_bac_id)
            ->get();
        return $cours;
    }

    public function destroy($matiere_bac_id,$bac_id)
    {
        $cours= DB::table('cours')
            ->select('cours.id')
            ->join('matiere_bac','matiere_bac.id','=','cours.matiere_bac_id')
            ->where('matiere_bac.id','=',$matiere_bac_id)
            ->get();

        foreach ($cours as $c){
            $supports= Support::where('cours_id','=',$c->id)->get();
            foreach ($supports as $item) {
                $pieces=Piece::where('support_id','=',$item->id)->get();
                foreach ($pieces as $piece) {
                    $piece->delete();
                }
                $item->delete();
            }
            $co=Cour::where('id','=',$c->id)->first();
            $co->delete();
        }

        $matieres= DB::table('matieres')
            ->select('matieres.id','matieres.nom')
            ->join('matiere_bac','matiere_bac.matiere_id','=','matieres.id')
            ->where('matiere_bac.id','=',$matiere_bac_id)
            ->get();
        $nom='';
        foreach ($matieres as $row){
            $nom=$row->nom;
            $matiere=Matiere::where('id','=',$row->id)->get();
            $bac=Bac::where('id','=',$bac_id)->get();
            foreach ($matiere as $m){
                foreach ($bac as $item) {
                    $m->Bacs()->detach($item);
                }
            }
        }

        return redirect('/admin/bac/'.$bac_id)->with("success","La matiere '$nom' a été supprimé");
    }

}
