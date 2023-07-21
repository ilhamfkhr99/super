<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MacamPerbaikan extends Model
{
    use HasFactory;

    protected $table = 'macam';
    protected $fillable = ['nama'];

    public function surat()
    {
        return $this->hasMany(surat::class);
    }
}
