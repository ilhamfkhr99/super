<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disposisi extends Model
{
    use HasFactory;

    protected $table = 'disposisi';
    protected $fillable = ['id_surat', 'id_user', 'tgl', 'jawaban', 'dari', 'kepada'];

    public function surat()
    {
        return $this->belongsTo(Surat::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
