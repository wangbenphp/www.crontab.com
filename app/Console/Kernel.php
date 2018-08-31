<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Jobs\MysqlBackUpToOss;
use App\Jobs\MysqlBackUpTimeOutDelToOss;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\LogicMakeCommand::class,
        Commands\ServiceMakeCommand::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        //MySQL定时备份到阿里云OSS
        $schedule->job(new MysqlBackUpToOss())->hourly();
        //删除阿里云OSS超时备份的MySQL
        $schedule->job(new MysqlBackUpTimeOutDelToOss())->hourly();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
