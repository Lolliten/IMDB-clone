<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Movie extends Model
{
    use HasFactory;
    public function mylists(): BelongsToMany
    {
        return $this->belongsToMany(MyList::class);
    }



    protected $fillable = ['titel', 'genre', 'country', 'year', 'director', 'photo'];
}
