<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    
    public function Post(): HasMany
{
    return $this->hasMany(related: Post::class, foreignKey: 'user_id');
}
}


