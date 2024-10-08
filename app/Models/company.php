<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class company extends Model
{
    use HasFactory;

    protected $table ='company';

    protected $fillable = [
        'c_name',
        'c_email',
        'c_phone_no',
        'c_address',
        'city',
        'country',
    ];
}
