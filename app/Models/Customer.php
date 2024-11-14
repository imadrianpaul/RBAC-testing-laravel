<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;

class Customer extends Authenticatable
{
    protected $table = 'customers';

    protected $fillable = [
        'username',
        'email',
        'mobilenumber',
        'password',
        'confirmpassword',
    ];

    protected $hidden = [
        'password',
        'confirmpassword',
        'remember_token',
    ];
}