<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Barang extends Model
{
    protected $fillable = [
        "nama_barang",
        "jumlah",
        "gambar",
        "is_active",
        "kategori_barang_id"
    ] ;

    public function kategori():BelongsTo{
        return $this->belongsTo(KategoriBarang::class, 'kategori_barang_id');
    }
}

