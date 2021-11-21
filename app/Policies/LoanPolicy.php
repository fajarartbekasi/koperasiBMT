<?php

namespace App\Policies;

use App\User;
use App\Loan;
use Illuminate\Auth\Access\HandlesAuthorization;

class LoanPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function show(User $user, Loan $loan)
    {
        return $user->hasRole(['ketua|bendahara']) || $loan->user->id == $user->id;
    }
    public function create(User $user)
    {
       return $user->hasRole('bendahara');
    }
    public function cetak(User $user)
    {
        return $user->hasRole(['sekretaris|bendahara']);
    }

}
