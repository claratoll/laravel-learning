<?php

namespace App\Models;

use App\Models\User;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Post extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'title', 
        'content', 
        'user_id', 
        'thumbnail',
    ];

    public function searchableAs(): string
    {
        return 'posts_index';
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function toSearchableArray()
    {
        $array = $this->toArray();
        return $array;
    }
}

