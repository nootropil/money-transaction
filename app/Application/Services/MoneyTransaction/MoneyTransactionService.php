<?php
declare(strict_types=1);

namespace App\Application\Services\MoneyTransaction;


use App\Domain\Models\MoneyTransaction;
use App\Domain\Repositories\MoneyTransaction\MoneyTransactionRepository;
use App\Domain\Services\MoneyTransaction\MoneyTransactionServiceInterface;

final class MoneyTransactionService implements MoneyTransactionServiceInterface
{
    /**
     * @var MoneyTransactionRepository
     */
    private $moneyTransactionRepository;

    /**
     * MoneyTransactionService constructor.
     * @param MoneyTransactionRepository $moneyTransactionRepository
     */
    public function __construct(MoneyTransactionRepository $moneyTransactionRepository)
    {
        $this->moneyTransactionRepository = $moneyTransactionRepository;
    }

    /**
     * @param string $usernameFrom
     * @param string $usernameTo
     * @param int $amountOfMoney
     */
    public function sendMoney(string $usernameFrom, string $usernameTo, int $amountOfMoney): void
    {
        $this->moneyTransactionRepository->makeTransaction(
            new MoneyTransaction($usernameFrom, $usernameTo, $amountOfMoney)
        );
    }
}