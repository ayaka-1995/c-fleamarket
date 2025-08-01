<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'condition',
        'image',
        'category_id',
        'user_id',
    ];

    public function comments()
    {
        return $this->hasMany(ProductComment::class, 'item_id');
    }
}
