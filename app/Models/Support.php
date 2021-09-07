<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    use HasFactory;
    protected $fillable = ["cours_id","teacher_id"];
    public function Cour(){
        return $this->belongsTo(Cour::class,'cours_id','id');
    }
    public function Teacher(){
        return $this->belongsTo(Teacher::class,'teacher_id','id');
    }
    public function Pieces()
    {
        return $this->hasMany(Piece::class, 'support_id','id');
    }
}
