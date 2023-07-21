<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organisasi extends Model
{
    use HasFactory;

    protected $table = 'organisasi';
    protected $fillable = ['nama', 'id_parent'];

    public function user()
    {
        return $this->hasMany(User::class);
    }
    public function organisasi()
    {
        return $this->hasMany(Organisasi::class, 'id_parent');
    }

    public function parent()
    {
        return $this->hasMany(Organisasi::class, 'id');
    }
}
