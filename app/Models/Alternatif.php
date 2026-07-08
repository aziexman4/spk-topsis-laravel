<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    use HasFactory;

    protected $fillable = ['nama_pelamar', 'user_id', 'cv_path'];

    public function penilaians()
    {
        return $this->hasMany(Penilaian::class);
    }
}
