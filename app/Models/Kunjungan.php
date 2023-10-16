<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kunjungan extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $guarded = ['id'];
    protected $with = ['user'];
    protected $appends = ['formatted_waktu_kunjungan'];

    public function getFormattedWaktuKunjunganAttribute(): string {
        return Carbon::parse($this->waktu_kunjungan)->isoFormat('dddd, D MMMM YYYY');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
