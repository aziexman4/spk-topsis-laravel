<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    use HasFactory;

    protected $fillable = ['nama_periode', 'is_active'];

    public function alternatifs()
    {
        return $this->hasMany(Alternatif::class);
    }
}
