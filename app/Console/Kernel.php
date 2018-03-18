<?php

namespace App\Console;

use App\Console\Commands\TransactMoney;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        TransactMoney::class
    ];
}
