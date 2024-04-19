<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory, Searchable;

    protected $fillable = ['title', 'content', 'user_id'];

    public function toSearchableArray()
{
    // Hämta arrayen som ska indexeras av Scout.
    $array = $this->toArray();

    // Anpassa arrayen efter dina behov.
    return $array;
}

    public function searchableAs()
    {
        return 'posts_index';
    }
    

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

