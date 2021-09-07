<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bac extends Model
{
    use HasFactory;
    protected $fillable = ["nom"];
    public function Matieres(){
        return $this->belongsToMany(Matiere::class, 'matiere_bac','bac_id','matiere_id')
            ->withTimestamps();
    }
}
