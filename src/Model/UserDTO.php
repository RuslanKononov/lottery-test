<?php

namespace App\Model;


class UserDTO
{
    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $password;

    /**
     * @var array|null
     */
    private $roles;

    /**
     * UserDTO constructor.
     *
     * @param string     $username
     * @param string     $password
     * @param array|null $roles
     */
    public function __construct(string $username, string $password, array $roles = null)
    {
        $this->username = $username;
        $this->password = $password;
        $this->roles = $roles;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return array|null
     */
    public function getRoles()
    {
        return $this->roles;
    }
}
