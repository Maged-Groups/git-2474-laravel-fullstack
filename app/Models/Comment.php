<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Comment extends Model
{
    use HasFactory;

    // Relations
    function replies(): HasMany
    {
        return $this->hasMany(Reply::class);
    }

    function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
