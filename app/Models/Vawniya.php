<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vawniya extends Model
{
    protected $table = 'vawniya'; // Specify the table name
    protected $fillable = ['folder_name', 'image_path', 'description']; // Allow mass assignment

    public function images()
{
    return $this->hasMany(\App\Models\Image::class, 'folder_id');
}
}

