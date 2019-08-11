<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Installment extends Model
{
    protected $table = 'installments';

    protected $guarded = [];

    /**
     * Angsuran terhubung dengan pinjaman
     */

     public function loan()
     {
         return $this->belongsTo(Loan::class);
     }
}
