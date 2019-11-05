<?php

namespace App\Prize;


use App\Entity\Users;

interface PrizeInterface
{
    const PRIZE_TYPE = [
        MoneyPrize::TYPE => MoneyPrize::class
    ];

    /**
     * @param Users $user
     */
    public function givePrize(Users $user): void;

    /**
     * @return mixed
     */
    public function selectPrize();
}
