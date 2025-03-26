<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anuradhapura extends Model
{
    protected $table = 'anuradhapura'; // Specify the table name
    protected $fillable = ['folder_name', 'image_path', 'description'];

    public function images()
{
    return $this->hasMany(\App\Models\Image::class, 'folder_id');
}
}

