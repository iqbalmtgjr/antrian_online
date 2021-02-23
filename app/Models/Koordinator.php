<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Koordinator extends Model
{
    use HasFactory;

    protected $table = 'koordinator';
    protected $fillable = ['NIP', 'username', 'name', 'user_id'];
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
