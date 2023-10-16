<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Narasumber extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $guarded = ['id'];
    protected $with = ['user'];
    protected $appends = ['formatted_tanggal_acara'];

    public function getFormattedTanggalAcaraAttribute(): string {
        return Carbon::parse($this->tanggal_acara)->isoFormat('dddd, D MMMM YYYY');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
