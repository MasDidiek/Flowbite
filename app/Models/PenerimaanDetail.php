<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PenerimaanDetail extends Model
{
    //

     protected $table = 'penerimaan_obat_detail';

        protected $fillable = [
            'penerimaan_id',
            'obat_id',
            'qty',
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
