<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kurunegala extends Model
{
    protected $table = 'kurunegala'; // Specify the table name
    protected $fillable = ['folder_name', 'image_path', 'description'];
   // use HasFactory;

   public function images()
   {
       return $this->hasMany(\App\Models\Image::class, 'folder_id');
   }
}
