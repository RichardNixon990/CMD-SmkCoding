<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class post extends Model
{
    protected $guarded = [];


    public function category(): BelongsTo
    {
        return $this->BelongsTo(Category::class, 'category_id');
    }
    public function user(): BelongsTo
    {
        return $this->BelongsTo(User::class, 'user_id');
    }
}


