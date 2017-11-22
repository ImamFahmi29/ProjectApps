<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReminderMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $detail;

    public function __construct($detail)
    {
        $this->detail = $detail;
    }

    public function build()
    {
        return $this->from('admin@md.com')
                    ->subject('MD - Request reset password')
                    ->view('emails.reminder')
                    ->with([
        'detail' => $this->detail,
        ]);
    }
}
