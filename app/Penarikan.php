<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penarikan extends Model
{
    protected $table = 'penarikans';
    protected $guarded = [];

    public function tabungan()
    {
        return $this->belongsTo(Tabungan::class, 'tabungan_id','id');
    }
}
