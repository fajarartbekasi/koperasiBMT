<?php

namespace App;

use App\Loan;
use App\Saving;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'jenis_kelamin', 'jabatan', 'alamat', 'no_hp','nip'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * pengguna dapat melakukan pinjaman lebih dari 1 kali
     */
    public function loans()
    {
        return $this->hasMany(Loan::class);
    }

    /**
     * anggota memiliki tabungan
     */
    public function savings()
    {
        return $this->hasMany(Saving::class);
    }
    /**
     * Total saldo anggota
     */
    public function Totalsaldo()
    {
        return $this->savings()->sum('saldo');
    }
    /**
     * hitung data pengajuan pinjaman
     */
    public function pengajuanPinjaman()
    {
        return $this->loans()->whereTerverifikasi(false);
    }
    /**
     * hitung semua data pinjaman
     */
    public function dataPinjaman()
    {
        return $this->loans()->whereTerverifikasi(true);
    }

    /**
     * hitung total pinjaman
     */

     public function totalPinjaman()
     {
        return $this->loans()->whereTerverifikasi(true)->sum('jumlah_pinjaman');
     }
}
