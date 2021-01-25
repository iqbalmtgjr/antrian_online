<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kepalabagian extends Model
{
    use HasFactory;

    protected $table = 'kepala_bagian';
    protected $fillable = ['NIP', 'username', 'name', 'user_id'];
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
