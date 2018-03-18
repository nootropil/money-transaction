<?php
declare(strict_types=1);

namespace App\Domain\Repositories\MoneyTransaction;


use App\Domain\Models\MoneyTransaction;

interface MoneyTransactionRepository
{
    /**
     * @param MoneyTransaction $model
     * @return void
     */
    public function makeTransaction(MoneyTransaction $model): void;

}