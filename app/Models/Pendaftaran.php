<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_eskul',
        'nama_siswa',
        'kelas',
        'no_wa',
        'alasan',
        'kesiapan',
        'pengalaman'
    ];

    protected $primaryKey = 'id_Pendaftaran';

    public function eskuls() {
        return $this->belongsTo(Eskul::class);
    }
}
