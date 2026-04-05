<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eskul extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_eskul',
        'nama_eskul',
        'kategori',
        'slogan',
        'deskripsi',
        'nama_pembina',
        'jadwal',
        'tempat',
        'id_pemegang',
        'foto',
];

    protected $primaryKey = 'id_eskul';

    protected function kelas() {
        return $this->belongsTo(kelas::class);
    }
    public function pendafarans() {
        return $this->hasMany(Eskul::class);
    }
}
