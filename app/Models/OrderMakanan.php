<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderMakanan extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode_transaksi',
        'nama',
        'customer',
        'tlp',
        'alamat',
        'email',
        'menu',
        'qty',
        'harga',
        'total_harga',
        'keterangan',
        'bukti_pembayaran'
    ];
}
