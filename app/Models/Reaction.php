<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reaction extends Model
{
    use HasFactory;

    // relations

    function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    function reactionType(): BelongsTo
    {
        return $this->belongsTo(ReactionType::class);
    }
}
