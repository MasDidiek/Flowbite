<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
 public $timestamps = false;
    protected $fillable = ['name', 'description'];

        public function subcategories()
        {
            return $this->hasMany(Subcategory::class);
        }
    }

