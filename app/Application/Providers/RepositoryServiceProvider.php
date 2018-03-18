<?php

namespace App\Application\Providers;

use App\Domain\Repositories\MoneyTransaction\MoneyTransactionRepository;
use App\Infrastructure\Repositories\MoneyTransaction\LaravelSqlMoneyTransactionRepository;
use Illuminate\Support\ServiceProvider;


class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any repositories.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(MoneyTransactionRepository::class, LaravelSqlMoneyTransactionRepository::class);
    }
}
