<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Service\Oss;

class MysqlBackUpTimeOutDelToOss implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     * 删除阿里云OSS备份的MySQL过期文件
     * @return void
     */
    public function handle()
    {
        $oss = new Oss();
        $oss->delete('backup/mysql/wanshuaba_20180830220001.sql');
    }
}
