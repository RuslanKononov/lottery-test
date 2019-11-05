<?php

namespace App\Model;


use App\Model\ValueObject\UserInvoice;

class SendMoneyDTO
{
    /**
     * @var int
     */
    private $amount;

    /**
     * @var UserInvoice
     */
    private $userInvoice;

    /**
     * SendMoneyDTO constructor.
     * @param int $amount
     * @param UserInvoice $userInvoice
     */
    public function __construct(int $amount, UserInvoice $userInvoice)
    {
        $this->amount = $amount;
        $this->userInvoice = $userInvoice;
    }
}
