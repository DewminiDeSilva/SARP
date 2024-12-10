<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffProfile extends Model
{
    use HasFactory;

    // Specify the table name (optional if it matches the class name in plural form)
    protected $table = 'staff_profiles';

    // Specify the fillable fields to allow mass assignment
    protected $fillable = [
        'staff_type',
        'photo',
        'name_with_initials',
        'nic_number',
        'designation',
        'permanent_address',
        'contact_number',
        'mobile_fixed',
        'email_address',
        'date_of_birth',
        'gender',
        'w_and_op_number',
        'highest_education_qualifications',
        'salary',
        'salary_increment_date',
        'personal_file_number',
        'appointment_letter',
        'first_appointment_date',
        'grade',
        'cv',
        'status',
    ];
}
