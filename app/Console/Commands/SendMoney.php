<?php

namespace App\Console\Commands;

use App\User\UserHandler;
use Illuminate\Console\Command;

class SendMoney extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sendmoney {--count=count user}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send money users';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if($this->option('count') < 1) {
            echo "Число пользователей больше 0\n";
            return false;
        }
        resolve(UserHandler::class)->sendUser($this->option('count'));
    }
}
