<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PermintaanDetail extends Model
{
    protected $table = 'permintaan_details';
    protected $primaryKey = 'id';
    protected $fillable = ['permintaan_id', 'barang_id', 'item_id', 'item_type', 'qty', 'qty_dikirim', 'qty_diterima','note'];

    public function item()
    {
        return $this->morphTo();
    }




    public function permintaanDetails()
    {
        return $this->morphMany(PermintaanDetail::class, 'item');
    }


}
