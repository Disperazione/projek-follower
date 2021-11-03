<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class DetailUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'email',
        'user_id',
        'email_verified_at',
        'saldo',
        'alamat',
        'no_hp',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
