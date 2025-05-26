<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
                 'name',
                'father_name',
                'mother_name',
                'addmission_no',
                'class',
                'roll_no',
                'dob',
                'email',
                'mobile',
                'bus_no',
                'blood_group',
                'address',
                'photo',
                'status',
                'user_id'
        // add other fields you're using
    ];
}
