<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class assignment extends Model
{

    public function answers(){
        return $this->hasMany(answer::class);
    }

    use HasFactory;
}
