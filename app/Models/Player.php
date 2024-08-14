<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Player extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image'
    ];

    public function fightone(): HasMany
    {
        return $this->hasMany(Fight::class, 'playeroneid');
    }

    public function fighttwo(): HasMany
    {
        return $this->hasMany(Fight::class, 'playertwoid');
    }

    public function scopeFilter(Builder $query, array $filters): void
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            $query->where('name', 'like', '%' . $search . '%')
                ->orwhere('description', 'like', '%' . $search . '%');
        });
    }
}
