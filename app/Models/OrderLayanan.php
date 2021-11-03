<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class OrderLayanan extends Model
{
    use HasFactory;
    protected $fillable = [
        'kategori',
        'user_id',
        'layanan',
        'target',
        'slug',
        'jumlah',
        'bukti',
        'pembayaran',
        'total',
        'status',
        'tgl'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
