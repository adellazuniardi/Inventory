<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gudang extends Model
{
    protected $guarded = [];

    public function inventories(){
        return $this->hasMany(Inventory::class);
    }

    public function deskripsis()
    {
        return $this->hasMany(Deskripsi::class);
    }

}
