<?php

namespace App\Jobs;

use App\Models\Statistic;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdateUserStatistics implements ShouldQueue {
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $userId;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($userId) {
        $this->userId = $userId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    
    public function handle() {
        $statistic = Statistic::firstOrCreate(
            ['user_id' => $this->userId],
            ['tasks_count' => 0]
        );

        $statistic->increment('tasks_count');
    }
}
