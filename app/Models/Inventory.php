<?php

namespace App\Models;

use App\Models\Gudang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inventory extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function gudang(){
        return $this->belongsTo(Gudang::class, 'gudang_inv','id');
    }

    
    // public function units(){
    //     return $this->belongsTo((Unit::class));
    // }


}

