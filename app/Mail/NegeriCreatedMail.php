<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Negeri;

class NegeriCreatedMail extends Mailable
{
    use Queueable, SerializesModels;
    public $negeri;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Negeri $negeri)
    {
        $this->negeri = $negeri;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.created-negeri-mailable')
                    ->subject('Notifikasi Dari Mailable Class');
    }
}
