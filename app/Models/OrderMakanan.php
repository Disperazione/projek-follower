<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderMakanan extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'tlp',
        'alamat',
        'email',
        'menu',
        'qty',
        'harga',
        'total_harga',
        'bukti_pembayaran'
    ];
}
