<?php

namespace App\Console;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {   
        $schedule->call(function(){
            DB::table('users')->where('name', '=', 'Cat Root')->delete();
        })->everyMinute();


        /*$schedule->call(function(){
            DB::table('users')->where('created_at', '<', now()->subMinute(1))->delete();
        })->everyMinute();

        $schedule->call(function(){
            DB::table('users')->delete();
        })->everyMinute();
        */
        // $schedule->command('inspire')->hourly();
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
