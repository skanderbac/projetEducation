<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
    use HasFactory;
    public function Bacs(){
        return $this->belongsToMany(Bac::class, 'matiere_bac','matiere_id','bac_id')
            ->withTimestamps();
    }
}
