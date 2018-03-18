<?php

namespace App\Console\Commands;

use App\Domain\Services\MoneyTransaction\MoneyTransactionServiceInterface;
use Cerbero\CommandValidator\ValidatesInput;
use Illuminate\Console\Command;


class TransactMoney extends Command
{
    use ValidatesInput;

    /**
     * @var MoneyTransactionServiceInterface
     */
    private $moneyTransactionService;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'money:send {usernameFrom?} {usernameTo?} {amountOfMoney?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Перевод денег между пользователями';

    /**
     * TransactMoney constructor.
     * @param MoneyTransactionServiceInterface $moneyTransactionService
     */
    public function __construct(MoneyTransactionServiceInterface $moneyTransactionService)
    {
        $this->moneyTransactionService = $moneyTransactionService;
        parent::__construct();
    }

    /**
     * @return array
     */
    public function messages() : array
    {
        return [
            'usernameFrom.required' => 'Ведите имя того кто переводит',
            'usernameTo.required' => 'Ведите имя того кому переводит',
            'usernameFrom.different' => 'Введите разных пользователей',
            'amountOfMoney.min' => 'Минимальная сумма - 1',
            'amountOfMoney.integer' => 'Сумма перевода должна быть целым числом',
            'amountOfMoney.required' => 'Ведите сумму перевода'
        ];
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'usernameFrom' => 'required|different:usernameTo',
            'usernameTo' => 'required',
            'amountOfMoney' => 'required|integer|min:1',
        ];
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $usernameFrom = $this->argument('usernameFrom');
        $usernameTo = $this->argument('usernameTo');
        $amountOfMoney = $this->argument('amountOfMoney');

        try {
            $this->moneyTransactionService->sendMoney($usernameFrom, $usernameTo, $amountOfMoney);
        } catch (\LogicException $exception) {
            $this->info('<error>' . $exception->getMessage() . '</error>');
            return;
        }

        $this->info('<fg=green>Деньги успешно переведенны!</>');
    }
}
