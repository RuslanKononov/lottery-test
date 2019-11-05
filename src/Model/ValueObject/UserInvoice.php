<?php

namespace App\Model\ValueObject;

use App\Model\UserInvoiceDTO;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Embeddable()
 */
class UserInvoice
{
    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $account;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $owner;

    /**
     * UserInvoice constructor.
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

    /**
     * @param UserInvoiceDTO $userInvoiceDTO
     *
     * @return UserInvoice
     */
    public static function create(UserInvoiceDTO $userInvoiceDTO): self
    {
        return new self($userInvoiceDTO->getAccount(), $userInvoiceDTO->getOwner());
    }
}
