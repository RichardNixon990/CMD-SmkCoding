<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    protected $guarded = [];


    public function Category(): BelongsTo
{
    return $this->BelongsTo(related: Category::class, foreignKey: 'category_id');
}
    public function user(): BelongsTo
{
    return $this->BelongsTo(related: User::class, foreignKey: 'user_id');
}
}


