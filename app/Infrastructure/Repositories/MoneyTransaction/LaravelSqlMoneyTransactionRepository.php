<?php
declare(strict_types=1);

namespace App\Infrastructure\Repositories\MoneyTransaction;

use App\Domain\Models\MoneyTransaction;
use App\Domain\Repositories\MoneyTransaction\MoneyTransactionRepository;
use Illuminate\Support\Facades\DB;
use App\Infrastructure\Utils\StringHelpers;
use PDO;

final class LaravelSqlMoneyTransactionRepository implements MoneyTransactionRepository
{
    const TABLE_NAME = 'public.user';

    /**
     * @param MoneyTransaction $model
     * @return void
     */
    public function makeTransaction(MoneyTransaction $model): void
    {
        try {
            $usernameFrom = $model->getUsernameFrom();
            $usernameTo = $model->getUsernameTo();
            $amountOfMoney = $model->getAmountOfMoney();

            DB::transaction(function () use ($usernameFrom, $usernameTo, $amountOfMoney) {
                /* @var PDO $pdo */
                $pdo = DB::connection()->getPdo();
                $stmt = $pdo->prepare("SELECT send_money_from_user_to_user (:usernameFrom, :usernameTo, :amountOfMoney);");
                $stmt->bindValue(':usernameFrom', $usernameFrom, PDO::PARAM_STR);
                $stmt->bindValue(':usernameTo', $usernameTo, PDO::PARAM_STR);
                $stmt->bindValue(':amountOfMoney', $amountOfMoney, PDO::PARAM_INT);
                $stmt->execute();
            });
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $message = StringHelpers::getBetween($message, '||', '||');
            $message = $message !== null ? $message : "Перевод денег не удался по неизвестной причине";

            throw new  \LogicException($message);
        }
    }
}