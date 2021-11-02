<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'email',
        'email_verified_at',
        'password',
        'saldo',
        'alamat',
        'no_hp',
    ];
}
