<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang_masuk extends Model
{
    

    protected $table = 'tbl_barang_masuk';

    protected $fillable = [
        'tanggal',
        'id_barang',
        'qty',
        'price',
        'no_faktur',
        'batch_no',
        'expired_date',
        'pengirim',
        'penerima',
        'notes',
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang');
    }
}
