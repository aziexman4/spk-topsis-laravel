<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    use HasFactory;

    protected $fillable = ['nama_pelamar', 'user_id', 'cv_path', 'periode_id', 'status'];

    public function penilaians()
    {
        return $this->hasMany(Penilaian::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function periode()
    {
        return $this->belongsTo(Periode::class);
    }
}
