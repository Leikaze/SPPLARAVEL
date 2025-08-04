<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class logins_admin extends Model
{
    use HasFactory;

    protected $table = 'logins_admin';

    protected $fillable = [
        'username',
        'password'
    ];
}