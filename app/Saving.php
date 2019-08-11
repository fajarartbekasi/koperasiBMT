<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Saving extends Model
{
    protected $table = 'savings';

    protected $guarded = [];

    /**
     * Anggota memiliki tabungan
     */

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
