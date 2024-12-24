<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reply extends Model
{
    use HasFactory;

    // relations

    function comment(): BelongsTo
    {
        return $this->belongsTo(Comment::class);
    }

    function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
