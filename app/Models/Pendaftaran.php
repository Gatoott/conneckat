<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_kelas',
        'id_eskul',
        'nama_siswa',
        'alasan'
    ];

    public function eskuls() {
        return $this->belongsTo(Eskul::class);
    }
}
