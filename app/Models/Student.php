<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ["bac_id","user_id","matiere_id"];
    public function User(){
        return $this->belongsTo(User::class);
    }
    public function Bac(){
        return $this->belongsTo(Bac::class);
    }
    public function Matiere(){
        return $this->belongsTo(Matiere::class);
    }
}
