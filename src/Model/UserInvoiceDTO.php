<?php

namespace App\Model;

class UserInvoiceDTO
{
    /**
     * @var string
     */
    private $account;

    /**
     * @var string
     */
    private $owner;

    /**
     * InvoiceDTO constructor.
     *
     * @param string $account
     * @param string $owner
     */
    public function __construct(string $account = '', string $owner = '')
    {
        $this->account = $account;
        $this->owner = $owner;
    }

    /**
     * @return string
     */
    public function getAccount(): string
    {
        return $this->account;
    }

    /**
     * @return string
     */
    public function getOwner(): string
    {
        return $this->owner;
    }
}
