<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    // Relations

    function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    function reactions(): HasMany
    {
        return $this->hasMany(Reaction::class);
    }

    function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    function postStatus(): BelongsTo
    {
        return $this->belongsTo(related: PostStatus::class);
    }

}
