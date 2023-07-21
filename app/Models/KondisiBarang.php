<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KondisiBarang extends Model
{
    use HasFactory;

    protected $table = 'kondisi_barang';
    protected $fillable = ['nama'];

    public function surat()
    {
        return $this->hasMany(surat::class);
    }
}
