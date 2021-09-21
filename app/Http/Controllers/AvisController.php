<?php

namespace App\Http\Controllers;

use App\Models\Avi;
use App\Models\Support;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Integer;

class AvisController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            "star"=>"required",
        ]);
        Avi::create([
            'note'=>$request->get('star'),
            'support_id'=>$request->get('support_id'),
            'user_id'=>auth()->user()->id
        ]);

        $avis=Avi::where('support_id','=',$request->get('support_id'))->get();
        $nombre=0;
        $total=0;
        foreach ($avis as $a) {
            $nombre++;
            $total+=$a->note;
        }

        if($nombre==0){
            $result=0;
        }
        else{
            $result=round($total/$nombre,2);
        }
        $support=Support::find($request->get('support_id'));
        $support->update([
            'note'=>$result
        ]);

        return redirect('/cours/'.$request->get('matiere_bac_id'))->with("success","merci d'avoir donné votre avis !");
    }
}
