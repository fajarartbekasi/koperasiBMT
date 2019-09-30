<?php

namespace App\Console\Commands;

use App\Installment;
use App\Loan;
use App\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Notifications\Messages\NexmoMessage;
use Illuminate\Support\Facades\DB;
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
        /**
         * mengambil tanggal 30 hari dari tiap bulan
         * dimulai dari januari
         */
        // $get_last_date_every_month = Carbon::now()
        //                                      ->lastOfMonth()
        //                                      ->addDays(8)
        //                                      ->diffInDays(now()->firstOfMonth());

        $get_last_date_every_month = Carbon::now()
                                            ->lastOfMonth()
                                            ->addDays(7)
                                            ->toDateString();
        /**
         * Mengambil data pinjaman
         */
        $loan = Loan::first();

        $angs = Installment::
                    whereNotIn('loan_id',[$loan->id])
                    ->whereBetween('tanggal_bayar',['$laon->tanggal_persetujuan', $get_last_date_every_month])
                    ->orWhereNull('tanggal_bayar')
                    ->get();

                    return Nexmo::message()->send([
                        'to' => '+62'. $loan->user->phone,
                        'from'   => 'KOPERASI BMT',
                        'text'   => 'Hello,' . $loan->user->name . 'pengajuan pinjaman anda telah kami setujui'
        ]);
    }
}
