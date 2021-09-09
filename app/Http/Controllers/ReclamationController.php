<?php

namespace App\Http\Controllers;

use App\Models\Reclamation;
use App\Models\Student;
use Illuminate\Http\Request;

class ReclamationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(auth()->user()->role=='Admin'){
            $reclamations=Reclamation::with('user')->get();
            return view('reclamation.index',compact('reclamations'));
        }
        else{
            return redirect('/')->with("alert","vous n'avez pas la permission pour cette page");
        }

    }

    public function mesreclamations()
    {
        if(auth()->user()->role!='Admin'){
            if(auth()->user()->role=='Eleve'){
                $eleve=Student::where('user_id','=',auth()->user()->id)->first();
                if($eleve->blocked==1){
                    return redirect('/');
                }
            }
            $reclamations=Reclamation::where('user_id','=',auth()->user()->id)->get();
            return view('reclamation.mesreclamations',compact('reclamations'));
        }
        else{
            return redirect('/admin/bacs')->with("alert","vous n'avez pas la permission pour cette page");
        }

    }
    public function create()
    {
        if(auth()->user()->role!='Admin'){
            return view('reclamation.create');
        }
        else{
            return redirect('/admin/bacs')->with("alert","vous n'avez pas la permission pour cette page");
        }
    }
    public function edit($reclamation)
    {
        if(auth()->user()->role!='Admin'){
            $reclamation=Reclamation::find($reclamation);

            return view('reclamation.update',compact('reclamation'));
        }
        else{
            return redirect('/admin/bacs')->with("alert","vous n'avez pas la permission pour cette page");
        }

    }
    public function store(Request $request)
    {
        $request->validate([
            "type"=>"required",
            "description"=>"required",
        ]);
        if($request->hasFile('fichier')){
            $file=$request->file('fichier');
            $name = time().rand(1,100).'.'.$file->extension();
            $file->move(public_path('reclamation'), $name);

            Reclamation::create(['type'=>$request->get('type'),'description'=>$request->get('description'),'fichier'=>$name,'user_id'=>auth()->user()->id]);
        }
        else {
            Reclamation::create(['type' => $request->get('type'), 'description' => $request->get('description'), 'fichier' => '', 'user_id' => auth()->user()->id]);
        }
        return redirect('/reclamations')->with("success","réclamation envoyée");

    }

    public function update(Request $request)
    {
        $reclamation=Reclamation::find($request->get('reclamation_id'));
        $request->validate([
            "type"=>"required",
            "description"=>"required",
        ]);
        if($request->hasFile('fichier')){
            $file=$request->file('fichier');
            $name = time().rand(1,100).'.'.$file->extension();
            $file->move(public_path('reclamation'), $name);

            $reclamation->update(['type'=>$request->get('type'),'description'=>$request->get('description'),'fichier'=>$name]);
        }
        else {
            $reclamation->update(['type' => $request->get('type'), 'description' => $request->get('description')]);
        }
        return redirect('/reclamations')->with("success","réclamation modifiée");

    }

    public function destroy(Request $request){
        $reclamation=Reclamation::find($request->get('reclamation_id'));
        $reclamation->delete();
        return redirect('/reclamations')->with("success","réclamation supprimée");

    }

    public function detailAdmin($reclamation){
        if(auth()->user()->role=='Admin'){
            $reclamation=Reclamation::find($reclamation);

            return view('reclamation.detailadmin',compact('reclamation'));
        }
        else{
            return redirect('/')->with("alert","vous n'avez pas la permission pour cette page");
        }
    }

    public function reponse(Request $request){
        $request->validate([
            'reponse'=>'required',
            'reclamation_id'=>'required'
        ]);
        $reclamation=Reclamation::find($request->get('reclamation_id'));
        $reclamation->update([
           'reponse'=>$request->get('reponse'),
            'etat'=>1
        ]);
        return redirect('/admin/reclamations/detail/'.$request->get('reclamation_id'))->with('success',"votre réponse a été envoyée!");
    }

    public function detail($reclamation){
        if(auth()->user()->role!='Admin'){
            $reclamation=Reclamation::find($reclamation);

            return view('reclamation.detail',compact('reclamation'));
        }
        else{
            return redirect('/admin/bacs')->with("alert","vous n'avez pas la permission pour cette page");
        }

    }

}
