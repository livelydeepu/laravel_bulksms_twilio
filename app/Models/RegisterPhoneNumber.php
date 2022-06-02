<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterPhoneNumber extends Model
{
    use HasFactory;

    protected $table= "register_phone_number";
    
    protected $fillable = [
        'phone_number'
    ];
}
