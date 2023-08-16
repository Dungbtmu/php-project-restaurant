<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $table = 'gallery';
    protected $fillable = [
        'item',
        'path',
        'price',
        'description',
    ];

    public function meal()
    {
        return $this->hasOne(Meal::class, 'item', 'item');
    }
}