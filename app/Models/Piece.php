<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Piece extends Model
{
    use HasFactory;
    protected $fillable = ["url","support_id"];
    public function Support(){
        return $this->belongsTo(Support::class,'support_id');
    }

}
