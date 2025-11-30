<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permintaan extends Model
{

    protected  $fillable = ['user_id', 'kategori_permintaan', 'tanggal', 'no_surat','status', 'keterangan'];

       
    public function details()
    {
        return $this->hasMany(PermintaanDetail::class);
    }
   
     public function user() {
        return $this->belongsTo(User::class);
    }




}
