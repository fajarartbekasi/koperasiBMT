<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = 'types';

    protected $guarded = [];

    /**
     * Jenis pinjaman terhubung dengan pinjaman
     */
    public function loans()
    {
        return $this->hasMany(Loan::class);
    }
}
