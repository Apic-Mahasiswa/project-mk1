<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class status extends Model
{
    protected $fillable = [
        'flag','user_id','attachment'
    ];

    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }
}
