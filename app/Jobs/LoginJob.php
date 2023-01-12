<?php

namespace App\Jobs;

use App\Mail\LoginMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class LoginJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $data_email;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data_email)
    {
        $this->data_email = $data_email;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $data_email = $this->data_email;
        $email      = new LoginMail($data_email);
        Mail::to($data_email['email_penerima'])->send($email);
    }
}
