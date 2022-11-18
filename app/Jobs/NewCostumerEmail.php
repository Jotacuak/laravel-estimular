<?php

namespace App\Jobs;

use App\Mail\Costumer as Notice;
use App\Mail\Welcome as Welcome;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailer;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class NewCostumerEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $costumer;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->costumer = $request;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Mailer $mailer)
    {
        $mailer
        ->to(['info@estimular.org'])
        ->send(new Notice($this->costumer));

        $mailer
        ->to($this->costumer->email)
        ->send(new Welcome());
    }
}
