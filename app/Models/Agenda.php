<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Agenda extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['division','user'];
    protected $appends = ['formatted_waktu_pelaksanaan'];

    public function getFormattedWaktuPelaksanaanAttribute(): string {
        return Carbon::parse($this->waktu_pelaksanaan)->isoFormat('dddd, D MMMM YYYY');
    }

    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    
}
