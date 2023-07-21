<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $table = 'kategori';
    protected $fillable = ['nama', 'kode'];

    public function merk()
    {
        return $this->hasMany(Merk::class);
    }
    public function barang()
    {
        return $this->hasMany(Barang::class);
    }
}
