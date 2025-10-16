<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LokasiBarang extends Model
{
    use HasFactory;

    protected $table = 'lokasi_barang';
    protected $fillable = ['nama', 'deskripsi'];

    // Relasi: Lokasi punya banyak Barang
    public function barang()
    {
        return $this->hasMany(Barang::class, 'lokasi_barang_id');
    }
}
