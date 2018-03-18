<?php
declare(strict_types=1);

namespace App\Domain\Services\MoneyTransaction;


interface MoneyTransactionServiceInterface
{
    /**
     * @param string $usernameFrom
     * @param string $usernameTo
     * @param int $amountOfMoney
     */
    public function sendMoney(string $usernameFrom, string $usernameTo, int $amountOfMoney): void;

}