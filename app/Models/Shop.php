<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $fillable = [
        'user_id', 'username', 'category_id', 'title', 'description', 'type', 'sort', 'logo', 'approved', 'hidden', 'address', 'phone', 'domain', 'expire'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeQuery($query)
    {
        return $query;
    }
}
