<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Login extends Model
{
    use HasFactory;
    protected $table="logins";
      protected $fillable = [
        'name',
        'email',
        'password',
    ];
}
