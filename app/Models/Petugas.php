<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    use HasFactory;

    protected $table = 'petugas';
    protected $fillable = ['NIP', 'username', 'name', 'user_id', 'loket_pelayanan_id'];
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function loket()
    {
        return $this->belongsTo(Loketpelayanan::class, 'loket_pelayanan_id');
    }
}
