<?php

namespace App\Service;

use App\Entity\Users;
use App\Model\UserDTO;

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
}