<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class answer extends Model
{

    public function assignment(){
        return $this->belongsTo(assignment::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    use HasFactory;
}