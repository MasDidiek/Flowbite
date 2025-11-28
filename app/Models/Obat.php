<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    
    protected $fillable = ['kategori', 'nama','satuan','stock', 'keterangan'];
}
