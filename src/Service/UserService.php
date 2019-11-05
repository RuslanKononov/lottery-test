<?php

namespace App\Service;

use App\Entity\Users;
use App\Model\UserDTO;
use App\Model\UserInvoiceDTO;
use App\Model\ValueObject\UserInvoice;

class UserService
{
    /**
     * @param UserDTO $userDTO
     *
     * @return Users
     */
    public function createUser(UserDTO $userDTO): Users
    {
        return Users::create($userDTO);
    }

    /**
     * @param Users          $user
     * @param UserInvoiceDTO $userInvoiceDTO
     */
    public function setUserInvoice(Users $user, UserInvoiceDTO $userInvoiceDTO): void
    {
        $userInvoice = UserInvoice::create($userInvoiceDTO);
        $user->setUserInvoice($userInvoice);
    }
}
