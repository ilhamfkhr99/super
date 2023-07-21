<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Progres extends Model
{
    use HasFactory;

    protected $table = 'progres';
    protected $fillable = ['id_surat', 'id_user', 'waktu', 'catatan'];

    public function surat()
    {
        return $this->belongsTo(Surat::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
