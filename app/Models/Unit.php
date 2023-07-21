<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;
    protected $table = 'unit';
    protected $fillable = ['id_bidang','nama', 'kategori'];

    public function user()
    {
        return $this->hasMany(User::class);
    }
    public function bidang()
    {
        return $this->belongsToMany(Bidang::class);
    }
}
