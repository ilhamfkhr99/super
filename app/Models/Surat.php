<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;

    protected $table = 'surat';
    protected $fillable = ['id_organisasi', 'id_macam', 'id_user', 'id_kondisi',
                        'nomer', 'jenis_pemeliharaan', 'kerusakan', 'tindakan', 'waktu', 'status', 'lokasi'
                        ];

    public function organisasi()
    {
        return $this->belongsTo(Organisasi::class);
    }
    public function macam()
    {
        return $this->belongsTo(MacamPerbaikan::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function kondisi()
    {
        return $this->belongsTo(KondisiBarang::class);
    }
    public function ttd()
    {
        return $this->hasMany(Ttd::class);
    }
}
