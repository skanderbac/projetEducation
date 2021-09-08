<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reclamation extends Model
{
    use HasFactory;
    protected $fillable = ["type","description","fichier","confirmed","user_id"];
    public function User(){
        return $this->belongsTo(User::class);
    }
}
