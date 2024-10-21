<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CDFMember extends Model
{
    use HasFactory;
    protected $fillable = [
       'member_name', 'member_nic', 'address', 'contact_number', 'gender', 'dob', 
        'youth', 'position', 'representing_organization',  'cdf_name','cdf_address',
    ];
    

    public function cdf()
    {
        return $this->belongsTo(Cdf::class);
    }
   
}
