<?php
declare(strict_types=1);

namespace App\Domain\Models;


final class MoneyTransaction
{
    /**
     * @var string
     */
    private $usernameFrom;

    /**
     * @var string
     */
    private $usernameTo;

    /**
     * @var int
     */
    private $amountOfMoney;

    /**
     * MoneyTransaction constructor.
     * @param string $usernameFrom
     * @param string $usernameTo
     * @param int $amountOfMoney
     */
    public function __construct(
        string $usernameFrom,
        string $usernameTo,
        int $amountOfMoney
    )
    {
        $this->usernameFrom = $usernameFrom;
        $this->usernameTo = $usernameTo;
        $this->amountOfMoney = $amountOfMoney;
    }

    /**
     * @return string
     */
    public function getUsernameFrom(): string
    {
        return $this->usernameFrom;
    }

    /**
     * @return string
     */
    public function getUsernameTo(): string
    {
        return $this->usernameTo;
    }

    /**
     * @return int
     */
    public function getAmountOfMoney(): int
    {
        return $this->amountOfMoney;
    }
}