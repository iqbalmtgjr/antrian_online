<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lamapelayanan extends Model
{
    use HasFactory;

    protected $table = 'lama_pelayanan';
    protected $fillable = ['lamapelayanan'];
    protected $guarded = [];

    public function antrians()
    {
        return $this->hasMany(Antrian::class, 'lamapelayanan_id');
    }

    public function getLamaPelayananAttribute()
    {
        return Carbon::parse($this->attributes['lamapelayanan'])
            ->format('H:i:s');
    }
}
