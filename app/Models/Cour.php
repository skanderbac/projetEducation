<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cour extends Model
{
    use HasFactory;
    protected $fillable = ["id","titre","matiere_bac_id"];
    public function Matiere(){
        return $this->belongsTo(Matiere::class);
    }
    public function Supports()
    {
        return $this->hasMany(Support::class, 'cours_id','id');
    }


}
