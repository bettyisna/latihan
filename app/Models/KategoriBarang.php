<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KategoriBarang extends Model
{
    protected $fillable = [
        "kategori",
    ] ;

    public function barangs(): HasMany {
        return $this->hasMany(Barang::class);
    }
}
