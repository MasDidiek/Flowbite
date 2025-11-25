<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    
    protected $table= 'tbl_barang';

    protected $fillable = [
        'kode_barang',
        'sumber_dana',
        'name',
        'id_category',
        'id_subcategory',
        'satuan',
        'stock',
        'merk',
        'penyedia',
        'image',
        'description',
    ];

    public function barang_masuk()
    {
        return $this->hasMany(Barang_masuk::class, 'id_barang', 'id');
    }


}
