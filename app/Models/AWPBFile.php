<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AWPBFile extends Model
{
    use HasFactory;

    protected $table = 'awpb_files';

    protected $fillable = ['year', 'version', 'file_path'];
}
