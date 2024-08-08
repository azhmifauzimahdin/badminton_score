<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Fight extends Model
{
    use HasFactory;

    protected $fillable = [
        'playeroneid',
        'playertwoid',
        'startdate',
        'enddate'
    ];

    public function playerone(): BelongsTo
    {
        return $this->belongsTo(Player::class, 'playeroneid');
    }

    public function playertwo(): BelongsTo
    {
        return $this->belongsTo(Player::class, 'playertwoid');
    }
}
