<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';

    protected $fillable = [
        'lokasi_barang_id',
        'perolehan_barang_id',
        'kode_barang',
        'nama',
        'merk',
        'bahan',
        'tahun_perolehan',
        'kondisi',
        'jumlah',
        'harga_total',
        'harga_per_unit',
        'catatan'
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
