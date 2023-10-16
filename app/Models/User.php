<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'name',
    //     'username',
    //     'email',
    //     'password',
    // ];

    protected $guarded = ['id'];
    protected $with = ['division'];
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'division_id',
        'level_user', // tambahkan ini
    ];
        
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'level_user' => 'string', // tambahkan ini
    ];
    protected $appends = ['formatted_updated_at'];

    public function getFormattedUpdatedAtAttribute(): string {
        return Carbon::parse($this->updated_at)->isoFormat('dddd, D MMMM YYYY');
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function agendas()
    {
        return $this->hasMany(Agenda::class);
    }

    public function pengumumans()
    {
        return $this->hasMany(Pengumuman::class);
    }

    public function narasumbers()
    {
        return $this->hasMany(Narasumber::class);
    }

    public function kunjungans()
    {
        return $this->hasMany(Kunjungan::class);
    }

    public function profil()
    {
        return $this->hasMany(Profil::class);
    }

    public function division()
    {
        return $this->belongsTo(Division::class);
    }
    
}
