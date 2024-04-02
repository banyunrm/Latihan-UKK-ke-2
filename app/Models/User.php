<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'User';
    protected $primarikey = 'UserID';
    protected $primaryKey = 'UserID';
    public $timestamps = 'true';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'password',
        'email',
        'fullname',
        'role',
        'address'
    ];

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class, 'UserID');
    }

    public function koleksipribadi()
    {
        return $this->hasMany(KoleksiPribadi::class, 'UserID');
    }

    public function ulasanbuku()
    {
        return $this->hasMany(UlasanBuku::class, 'UserID');
    }

    public function isAdmin()
    {
        return $this->role === 'admin'; // Mengembalikan nilai true jika role pengguna adalah 'admin'
    }

    public function isPetugas()
    {
        return $this->role === 'petugas'; // Mengembalikan nilai true jika role pengguna adalah 'petugas'
    }
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
        'password' => 'hashed',
    ];
}
