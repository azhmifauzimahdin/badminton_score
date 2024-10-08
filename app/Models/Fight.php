<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Fight extends Model
{
    use HasFactory;

    protected $fillable = [
        'playeroneid',
        'playertwoid',
        'venue',
        'court',
        'startdate',
        'enddate',
        'status'
    ];

    protected $with = [
        'playerone',
        'playertwo',
        'skors',
        'skor',
        'finalskor',
        'setfight'
    ];

    public function playerone(): BelongsTo
    {
        return $this->belongsTo(Player::class, 'playeroneid');
    }

    public function playertwo(): BelongsTo
    {
        return $this->belongsTo(Player::class, 'playertwoid');
    }

    public function skors(): HasMany
    {
        return $this->hasMany(Skor::class, 'fightid')->where('status', true);
    }

    public function skor(): HasMany
    {
        return $this->hasMany(Skor::class, 'fightid');
    }

    public function finalskor(): HasOne
    {
        return $this->hasOne(Skor::class, 'fightid')->latestOfMany();
    }

    public function setfight(): HasOne
    {
        return $this->hasOne(FinalSkor::class, 'fightid');
    }

    public function scopeFilter(Builder $query, array $filters): void
    {
        $query->when(
            $filters['search'] ?? false,
            function ($query, $search) {
                return $query->where('venue', 'like', '%' . $search . '%')
                    ->orwhere('court', $search)
                    ->orwhere('startdate', 'like', '%' . $search . '%')
                    ->orWhereHas(
                        'playerone',
                        fn($query) =>
                        $query->where('name', 'like', '%' . $search . '%')
                    )
                    ->orWhereHas(
                        'playertwo',
                        fn($query) =>
                        $query->where('name', 'like', '%' . $search . '%')
                    );
            }
        );
    }
}
