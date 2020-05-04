<?php

namespace App\Jobs;

use App\EmailsScheduled;
use App\Mail\MailProvider;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class EmailProviderQueue implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $emailsScheduled;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(EmailsScheduled $emailsScheduled)
    {
        $this->emailsScheduled=$emailsScheduled;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $emailsScheduled = $this->emailsScheduled;
        $emails = json_decode($emailsScheduled ->to);
        foreach ( $emails as $email){

            Mail::send(new MailProvider($email,$emailsScheduled->subject,$emailsScheduled->message));
        }
        $emailsScheduled->delete();
    }
}
