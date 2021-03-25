<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Laporan extends Model
{
    use HasFactory;

    protected $table = 'laporan';
    protected $fillable = ['id_pelayanan', 'lamapelayanan_id', 'id_user', 'no_antrian', 'hari', 'tgl_antrian', 'waktu_awal_antrian', 'waktu_akhir_antrian', 'lama_menunggu', 'waktu_awal_pelayanan', 'waktu_akhir_pelayanan', 'lama_pelayanan', 'estimasi'];
    protected $guarded = [];

    public function getWaktuAkhirPelayananAttribute()
    {
        return Carbon::parse($this->attributes['waktu_akhir_pelayanan'])
            ->format('H:i:s');
    }

    public function getWaktuAwalPelayananAttribute()
    {
        return Carbon::parse($this->attributes['waktu_awal_pelayanan'])
            ->format('H:i:s');
    }

    public function getLamaPelayananAttribute()
    {
        return Carbon::parse($this->attributes['lama_pelayanan'])
        ->format(strtotime($this->attributes['lama_pelayanan']));
    }
}
