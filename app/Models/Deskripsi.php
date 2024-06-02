<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deskripsi extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function gudang()
    {
        return $this->belongsTo(Gudang::class, 'gudang_desk', 'id');
    }
}
