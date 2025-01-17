<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecialEvents extends Model
{
    protected $table = 'special_events'; // Specify the table name
    protected $fillable = ['folder_name', 'image_path', 'description'];

    public function images()
{
    return $this->hasMany(\App\Models\Image::class, 'folder_id');
}
}
