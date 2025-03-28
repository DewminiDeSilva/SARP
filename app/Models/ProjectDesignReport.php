<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectDesignReport extends Model
{
    use HasFactory;

    protected $fillable = ['version', 'file_path'];
}
