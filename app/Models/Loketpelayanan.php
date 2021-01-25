<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loketpelayanan extends Model
{
    use HasFactory;

    protected $table = 'loket_pelayanan';
    protected $fillable = ['loket_pelayanan'];
    protected $guarded = [];

    public function antrian()
    {
        return $this->hasOne(Antrian::class);
    }
}
