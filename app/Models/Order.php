<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [

        'user_id',

        'book_id',

        'nama',

        'nomor_hp',

        'alamat',

        'ekspedisi',

        'ongkir',

        'metode_pembayaran',

        'harga_buku',

        'total_harga',

        'status'

    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}