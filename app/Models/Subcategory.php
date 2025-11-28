<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $fillable = ['name', 'id_category', 'description'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category');
    }
}
