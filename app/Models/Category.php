<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'user_id','name','slug','parent_id','type','sort','icon','approved'
    ];

    public function parent()
    {
        return $this->belongsTo(Category::class,'parent_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function scopeQuery($query)
    {
        return $query;
    }
}
