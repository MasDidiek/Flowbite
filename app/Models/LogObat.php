<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogObat extends Model
{
      protected $table = 'log_obats';

        protected $fillable = [
            'stock_id',
            'jns_transaksi',
            'qty',
            'stock_awal',
            'stock_akhir',
            'keterangan',
        ];

        

     public function stock() {
        return $this->belongsTo(Stock::class);
    }
}
