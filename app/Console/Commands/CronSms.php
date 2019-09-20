<?php

namespace App\Console\Commands;

use App\Installment;
use App\Loan;
use App\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Notifications\Messages\NexmoMessage;
use Illuminate\Support\Facades\Mail;
use Nexmo\Laravel\Facade\Nexmo;

class CronSms extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sms:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $get_last_date_every_month = Carbon::now()
                                            ->lastOfMonth()
                                            ->toDateString();

        // $get_installment = Installment::where('loan_id',3)->get(['tanggal_bayar']);

        $loan = Loan::first();

        $angs = Installment::whereNotIn('loan_id')
            ->whereBetween('tanggal_bayar', $get_last_date_every_month)
            ->first();

        // if ($angs > $get_last_date_every_month) {
        //    return Nexmo::message()->send([
        //        'to' => '+6281384531904',
        //        'from'   => 'Chaerul Fajar Subhi',
        //        'text'   => 'Hello, Kata Abang Roma jangan begadang, lalu kenapa filmnya tayangnya malam'
        //    ]);
        // }
    }
}
