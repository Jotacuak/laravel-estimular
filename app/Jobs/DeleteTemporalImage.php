<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Vendor\Image\Models\ImageResized;

class DeleteTemporalImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
    ){
       
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        ImageResized::where('entity_id', null)->delete();
    }
}