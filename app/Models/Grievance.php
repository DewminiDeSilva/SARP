<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grievance extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'nic',
        'address',
        'subject',
        'grievance_description',
        'contact_number',
        'province',
        'district',
        'dsd',
        'gnd',
        'asc',
        'cascade_name',
        'tank_name',
        'date_received',
        'sub_project_name',
        'sub_project_gn_division',
    ];

    public function officers()
    {
        return $this->hasMany(Officer::class);
    }
}
