<?php

namespace App\Application\Providers;

use App\Application\Services\MoneyTransaction\MoneyTransactionService;
use App\Domain\Services\MoneyTransaction\MoneyTransactionServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {        /* User */
        $this->app->bind(MoneyTransactionServiceInterface::class, MoneyTransactionService::class);
    }
}
