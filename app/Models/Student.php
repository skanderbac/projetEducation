<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ["nom","prenom","bac_id"];
    public function Bac(){
        return $this->belongsTo(Bac::class);
    }
}
