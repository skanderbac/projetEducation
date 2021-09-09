<?php

namespace App\Http\Controllers;

use App\Models\Matiere;
use App\Models\Piece;
use App\Models\Support;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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
            "matiere_id"=>"required",
            "user_id"=>"required",
        ]);
        Teacher::create($request->all());
        return redirect('/')->with("success","Vous avez choisi votre matiere avec succés");
    }

    public function enseignants()
    {
        $teachers = Teacher::join('users', 'users.id', '=', 'teachers.user_id')->where('users.role','Enseignant')->orderBy('teachers.confirmed','asc')->paginate(10);
        return view('teachers.indexadmin',compact('teachers'));
    }

    public function confirme(Request $request)
    {
        $e=Teacher::select('teachers.id')->join('users','users.id','=','teachers.user_id')->where('users.id','=',$request->get('teacher_id'))->first();
        $ens=Teacher::find($e->id);
        $ens->update([
            'confirmed'=>1
        ]);
        return redirect('/admin/enseignants');
    }

    public function destroy(Request $request)
    {
        $supports= Support::where('teacher_id','=',$request->get('teacher_id'))->get();
        foreach ($supports as $item) {
            $pieces=Piece::where('support_id','=',$item->id)->get();
            foreach ($pieces as $piece) {
                $piece->delete();
            }
            $item->delete();
        }

        $e=Teacher::select('teachers.id')->join('users','users.id','=','teachers.user_id')->where('users.id','=',$request->get('teacher_id'))->first();
        $enseignant=Teacher::find($e->id);
        $nom = $enseignant->user->name;
        $enseignant->delete();
        $user=User::find($enseignant->user->id);
        $user->delete();
        return redirect('/admin/enseignants')->with("success","Enseignant(e) nomé ".$nom." est supprimé(e)");
    }
}
