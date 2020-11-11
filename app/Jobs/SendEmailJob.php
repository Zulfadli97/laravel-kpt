<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Mail;
use App\Models\Negeri;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $negeri;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Negeri $negeri)
    {
        $this->negeri = $negeri;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to('tarmizisanusi@gmail.com')->send(new \App\Mail\NegeriCreatedMail($this->negeri));
    }
}
