<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mannar extends Model
{
    protected $table = 'mannar'; // Specify the table name
    protected $fillable = ['folder_name', 'image_path', 'description'];

    public function images()
{
    return $this->hasMany(\App\Models\Image::class, 'folder_id');
}
}
