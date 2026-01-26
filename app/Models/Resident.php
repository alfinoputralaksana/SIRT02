<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Resident extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'nik',
        'phone',
        'email',
        'address',
        'family_head',
        'family_members',
        'status',
        'notes',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function reports(): HasMany
    {
        return $this->hasMany(Report::class);
    }

    public function letters(): HasMany
    {
        return $this->hasMany(Letter::class);
    }

    public function conversations(): HasMany
    {
        return $this->hasMany(ChatbotConversation::class);
    }
}
