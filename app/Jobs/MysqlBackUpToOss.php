<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Service\Oss;

class MysqlBackUpToOss implements ShouldQueue
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
     * 备份数据库文件到OSS
     * @return void
     */
    public function handle()
    {
        $oss = new Oss();
        $basePath = '/var/databackup/mysql/';
        $fileList = scandir($basePath);
        if ($fileList) {
            foreach ($fileList as $v) {
                if ($v != '.' && $v != '..') {
                    $res = $oss->upload($basePath . $v, 'backup/mysql/' . $v);
                    if ($res['state']) {
                        unlink($basePath . $v);
                    }
                }
            }
        }
    }
}
