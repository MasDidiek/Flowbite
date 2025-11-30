<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    
    protected $table= 'barangs';

    protected $fillable = [
        'name',
        'kategori',
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
