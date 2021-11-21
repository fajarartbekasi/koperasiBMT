<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tabungan extends Model
{
    protected $table = 'tabungans';

    protected $guarded = [];

    /**
     * Anggota memiliki tabungan
     */

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function penarikans()
    {
        return $this->hasMany(Penarikan::class);
    }
}
