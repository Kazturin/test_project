<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    use HasFactory;

    protected $fillable = ['article','name','status','data'];

    protected $casts = [
        'data' => 'json',
    ];

    public function scopeAvailable($query)
    {
        return $query->where('status', 'Доступен');
    }

    
}
