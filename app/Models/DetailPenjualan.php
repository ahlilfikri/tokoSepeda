<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPenjualan extends Model
{
    use HasFactory;
    protected $table = 'detailpenjualans'; 
    protected $fillable = [
        'produk',
        'jumlah',
        'penjualan',
    ];

    public function produks()
    {
        return $this->belongsTo(Produk::class, 'produk');
    }
    public function penjualans()
    {
        return $this->belongsTo(Penjualan::class, 'penjualan');
    }
}
