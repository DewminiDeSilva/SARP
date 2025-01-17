<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $table = 'images'; // Ensure this matches your database table name

    protected $fillable = [
        'folder_id',
        'album_name',
        'image_path',
    ];
    // Inverse relationship
    public function folder()
    {
        return $this->belongsTo(FolderModel::class, 'folder_id'); // Replace FolderModel with your actual folder model (e.g., Kurunegala)
    }

    
}

