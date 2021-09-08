<?php

namespace App\Http\Controllers;

use App\Models\Reclamation;
use Illuminate\Http\Request;

class ReclamationController extends Controller
{
    public function index()
    {
        $reclamations=Reclamation::with('user')->get();
        return view('reclamation.index',compact('reclamations'));
    }

    public function mesreclamations()
    {
        $reclamations=Reclamation::where('user_id','=',auth()->user()->id)->get();
        return view('reclamation.mesreclamations',compact('reclamations'));
    }
    public function create()
    {
        return view('reclamation.create');
    }
    public function edit($reclamation)
    {
        $reclamation=Reclamation::find($reclamation);


        return view('reclamation.update',compact('reclamation'));
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
        $reclamation=Reclamation::find($reclamation);

        return view('reclamation.update',compact('reclamation'));
    }

}
