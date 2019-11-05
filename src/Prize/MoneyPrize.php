<?php

namespace App\Prize;

use App\Entity\Users;
use App\Model\SendMoneyDTO;
use App\Service\SendMoneyService;

class MoneyPrize implements PrizeInterface
{
    const TYPE = 'money';

    //TODO: set limits to DB or to config in future
    const PRIZE_LIMIT = [
        'min' => 100,
        'max' => 10000,
    ];

    /**
     * @var SendMoneyService
     */
    private $sendMoneyService;

    /**
     * MoneyPrize constructor.
     *
     * @param SendMoneyService $sendMoneyService
     */
    public function __construct(SendMoneyService $sendMoneyService)
    {
        $this->sendMoneyService = $sendMoneyService;
    }

    /**
     * @param Users $user
     */
    public function givePrize(Users $user): void
    {
        $sendMoneyDTO = new SendMoneyDTO($this->selectPrize(), $user->getUserInvoice());
        $this->sendMoneyService->sendMoney($sendMoneyDTO);
    }

    /**
     * Select amount in limits of money prize
     *
     * @return int
     */
    public function selectPrize(): int
    {
        return rand(self::PRIZE_LIMIT['min'], self::PRIZE_LIMIT['max']);
    }
}
