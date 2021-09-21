<?php

namespace App\Http\Controllers;

use App\Models\Avi;
use App\Models\Bac;
use App\Models\Cour;
use App\Models\Matiere;
use App\Models\Piece;
use App\Models\Support;
use App\Models\Teacher;
use Faker\Provider\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SupportController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $request->validate([
            "cours_id"=>"required",
            "bac_id"=>"required",
            "filenames"=>"required",
        ]);
        $teacher_id=0;
        $liste = Teacher::where('user_id','=',auth()->user()->id)->get();
        foreach ($liste as $item) {
            $teacher_id=$item->id;
        }
        Support::create([
            'cours_id' =>$request->get('cours_id'),
            'teacher_id'=>$teacher_id
        ]);
        $l= Support::where('cours_id','=',$request->get('cours_id'))
            ->where('teacher_id','=',$teacher_id)
            ->orderBy('created_at','desc')
            ->first()
            ->get();
        $support_id =0;
        foreach ($l as $item) {
            $support_id = $item->id;
        }

        $files = [];
        if($request->hasfile('filenames'))
        {
            foreach($request->file('filenames') as $file)
            {
                $name = time().rand(1,100).'.'.$file->extension();
                $file->move(public_path('files'), $name);
                $files[] = $name;
                Piece::create([
                    'support_id' =>$support_id,
                    'url'=>$name
                ]);
            }
        }


        return redirect('/supports/bac/'.$request->get('bac_id'))->with("success","Vous avez ajouté votre support de cours avec succés");
    }


    public function supports(){
        if(auth()->user()->role=='Enseignant'){
            $bac=Bac::all();
            $matiere=Matiere::join('teachers','teachers.matiere_id','=','matieres.id')
                ->join('users','users.id','=','teachers.user_id')
                ->where('users.id','=',auth()->user()->id)
                ->get();
            return view('cours.support',compact('bac','matiere'));
        }
        else{
            return redirect('/')->with("alert","vous n'avez pas la permission pour cette page");
        }

    }

    public function messupports($bac_id){
        $teacher=Teacher::where('user_id','=',auth()->user()->id)->first();

        $cours= Cour::with('supports','supports.pieces')
            ->select('cours.id','cours.titre')
            ->join('matiere_bac','matiere_bac.id','=','cours.matiere_bac_id')
            ->join('supports','supports.cours_id','=','cours.id')
            ->where('supports.teacher_id','=',$teacher->id)
            ->where('bac_id','=',$bac_id)
            ->get();
        /*
        $cours= Cour::with('supports','supports.pieces')
            ->select('cours.id','cours.titre')
            ->join('matiere_bac','matiere_bac.id','=','cours.matiere_bac_id')
            ->join('supports','supports.cours_id','=','cours.id')
            ->where('supports.teacher_id','=',$teacher->id)
            ->where('bac_id','=',$bac_id)
            ->get();
        */

        /*$liste=[];
        foreach ($cours as $c){
            $pieces= Support::with('Pieces')
                ->where('teacher_id','=',$teacher->id)
                ->get();
            $c->supports=$pieces;
        }*/


        return view('cours.messupports',compact('cours','bac_id'));
        //return $cours;
    }

    public function delete(Request $request){
        $pieces=Piece::where('support_id','=',$request->get('support_id'))->get();
        foreach ($pieces as $p){
            $p->delete();
        }

        $avis=Avi::where('support_id','=',$request->get('support_id'))->get();
        foreach ($avis as $a){
            $a->delete();
        }

        $support=Support::where('id','=',$request->get('support_id'))->first();
        $support->delete();

        return redirect('/supports/bac/'.$request->get('bac_id'));
    }

}
