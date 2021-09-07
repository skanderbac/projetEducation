<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $fillable = ["confirmed","user_id","matiere_id"];
    public function User(){
        return $this->belongsTo(User::class);
    }
    public function Matiere(){
        return $this->belongsTo(Matiere::class);
    }
    public function Supports()
    {
        return $this->hasMany(Support::class, 'teacher_id');
    }
}
