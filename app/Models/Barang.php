<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';

    protected $fillable = [
        'kode_barang',
        'nama',
        'lokasi_barang_id',
        'perolehan_barang_id',
        'harga',
        'tahun_perolehan',
        'kondisi',
        'catatan',
    ];



    public function lokasi()
    {
        return $this->belongsTo(LokasiBarang::class, 'lokasi_barang_id');
    }

    public function perolehan()
    {
        return $this->belongsTo(PerolehanBarang::class, 'perolehan_barang_id');
    }
}
