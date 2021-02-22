<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $table = 'laporan';
    protected $fillable = ['id_pelayanan', 'id_user', 'no_antrian', 'hari', 'tgl_antrian', 'waktu_awal_antrian', 'waktu_akhir_antrian', 'lama_pelayanan', 'estimasi'];
    protected $guarded = [];
}
