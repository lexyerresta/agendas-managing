<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function agendas()
    {
        return $this->hasMany(Agenda::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function pengumumans()
    {
        return $this->hasMany(Pengumuman::class);
    }
}
