<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerolehanBarang extends Model
{
    use HasFactory;

    protected $table = 'perolehan_barang';
    protected $fillable = ['nama', 'deskripsi'];

    // Relasi: Perolehan punya banyak Barang
    public function barang()
    {
        return $this->hasMany(Barang::class, 'perolehan_barang_id');
    }
}
