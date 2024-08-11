<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Skor extends Model
{
    use HasFactory;

    protected $fillable = [
        'fightid',
        'set',
        'skorplayerone',
        'skorplayertwo',
        'startdate',
        'enddate',
        'status'
    ];

    public function fight(): BelongsTo
    {
        return $this->belongsTo(Fight::class);
    }

    public function setfight(): HasOne
    {
        return $this->hasOne(FinalSkor::class, 'fightid', 'fightid');
    }
}
