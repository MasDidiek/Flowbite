<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penerimaan extends Model
{
        protected $table = 'penerimaan_obat';

        protected $fillable = [
            'no_pembelian',
            'tgl_penerimaan',
            'penerima',
            'pengirim',
            'catatan',
        ];

        public function details()
        {
            return $this->hasMany(PenerimaanDetail::class);
        }
}
