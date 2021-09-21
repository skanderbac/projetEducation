<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avi extends Model
{
    use HasFactory;
    protected $fillable = ["note","user_id","support_id"];

    public function User(){
        return $this->belongsTo(User::class);
    }

    public function Support(){
        return $this->belongsTo(Support::class);
    }
}
