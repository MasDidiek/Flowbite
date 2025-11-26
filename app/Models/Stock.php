<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
        protected $table = 'stocks';

        protected $fillable = [
            'obat_id',
            'stock_akhir',
            'harga',
            'no_batch',
            'exp_date',
            'merk',
            'penyedia',
            'note',
        ];

        

     public function obat() {
        return $this->belongsTo(Obat::class);
    }
}
