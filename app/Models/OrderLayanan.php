<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderLayanan extends Model
{
    use HasFactory;
    protected $fillable = [
        'kategori',
        'layanan',
        'target',
        'slug',
        'jumlah',
        'pembayaran',
        'total',
        'status',
    ];
}
