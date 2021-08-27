<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;
    protected $fillable = ["user_id","message","chatbox_id"];
    public function User(){
        return $this->belongsTo(User::class);
    }
    public function Chatbox(){
        return $this->belongsTo(Chatbox::class);
    }
}
