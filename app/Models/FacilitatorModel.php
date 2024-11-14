<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class FacilitatorModel extends Authenticatable
{
    use HasApiTokens;
    protected $table = 'facilitators';

    protected $fillable = [
      'name', 'email', 'contact_num', 'password',
    ];

    protected $hidden = [
        'password', 'reset_token',
    ];
}