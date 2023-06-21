<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Memos extends Model
{
    use HasFactory;

    protected $fillable = ['memo'];

    // Relationship To User
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
