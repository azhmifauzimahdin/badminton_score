<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinalSkor extends Model
{
    use HasFactory;

    protected $fillable = [
        'fightid',
        'skorplayerone',
        'skorplayertwo'
    ];
}
