<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    protected $fillable = ['meal_name', 'gallery_id'];

    public function galleryItems()
    {
        return $this->hasMany(Gallery::class, 'gallery_id');
    }
}