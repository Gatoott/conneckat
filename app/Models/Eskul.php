<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eskul extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_pemegang',
        'nama_eskul',
        'slogan',
        'deskripsi',
        'logo',
        'dokumentasi',
        'pendaftaran',
    ];

    protected $primaryKey = 'id_eskul';

    protected function kelas() {
        return $this->belongsTo(kelas::class);
    }
    public function pendafarans() {
        return $this->hasMany(Eskul::class);
    }
}
