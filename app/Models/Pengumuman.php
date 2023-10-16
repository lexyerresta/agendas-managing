<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengumuman extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['division','user'];
    protected $table = 'pengumuman';
    protected $appends = ['formatted_created_at'];

    public function getFormattedCreatedAtAttribute(): string {
        return Carbon::parse($this->created_at)->isoFormat('dddd, D MMMM YYYY');
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
