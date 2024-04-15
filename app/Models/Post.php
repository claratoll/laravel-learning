<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory, Searchable;

    protected $fillable = ['title', 'content'];

    public function searchableAs(): string
    {
        return 'posts_index';
    }
}

