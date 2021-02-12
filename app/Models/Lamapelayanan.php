<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
