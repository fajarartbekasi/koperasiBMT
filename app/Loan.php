<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{

    protected $table = 'loans';

    protected $guarded = [];

    protected $casts = [
        'terverifikasi'       => 'boolean',
        'tanggal_pengajuan'   => 'date',
        'tanggal_persetujuan' => 'date',
    ];

    /**
     * anggota memiliki pinjaman
     */

     public function user()
     {
         return $this->belongsTo(User::class);
     }
     /**
      * Pinjaman memiliki jenis pinjaman
      */
      public function type()
      {
          return $this->belongsTo(Type::class);
      }
      /**
       * pinjaman memiliki angsuran
       */
      public function installment()
      {
          return $this->hasMany(Installment::class);
      }
}
