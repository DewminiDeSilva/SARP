<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mannar extends Model
{
    protected $table = 'mannar'; // Specify the table name
    protected $fillable = ['folder_name', 'image_path', 'description', 'parent_id'];

    public function images()
    {
        return $this->hasMany(\App\Models\Image::class, 'folder_id');
    }

    public function parent()
    {
        return $this->belongsTo(Mannar::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Mannar::class, 'parent_id');
    }
}
