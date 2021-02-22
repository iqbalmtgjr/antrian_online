<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Antrian extends Model
{
    use HasFactory;

    protected $table = 'antrian';
    protected $fillable = ['id_pelayanan', 'lamapelayanan_id', 'id_user', 'no_antrian', 'hari', 'tgl_antrian', 'waktu_awal_antrian', 'waktu_akhir_antrian', 'lama_pelayanan', 'estimasi'];
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pelayanan()
    {
        return $this->belongsTo(Loketpelayanan::class);
    }

    public function getWaktuAkhirAntrianAttribute()
    {
        return Carbon::parse($this->attributes['waktu_akhir_antrian'])
            ->format('H:i:s');
    }

    public function getWaktuAwalAntrianAttribute()
    {
        return Carbon::parse($this->attributes['waktu_awal_antrian'])
            ->format('H:i:s');
    }

    public function lamapelayanan()
    {
        return $this->belongsTo(Lamapelayanan::class, 'lamapelayanan_id');
    }

    // public function getLamaPelayananAttribute()
    // {
    //     return $this->lamapelayanan->lamapelayanan->isoFormat('H:i:s');
    // }

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])
            ->format('H:i:s');
    }
}
