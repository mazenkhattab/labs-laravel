<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use app\Models\post;
use Illuminate\Support\Carbon;

class PruneOldPostsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    public $post;
    
    public function __construct(  )
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
         $oldposts = Post::where('created_at', '<=', Carbon::now()->subYears(2)->toDateTimeString())->get();
         echo $oldposts;
         echo 'trial';
    //    return  Post::where('created_at', '<=', Carbon::now()->subYears(2)->toDateTimeString())->forceDelete();
    // return Post::onlyTrashed()->whereDate('deleted_at', '<=', Carbon::now()->subYears(2)->toDateTimeString())->forceDelete();
        
    }
}
