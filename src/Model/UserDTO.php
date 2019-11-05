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
     * @var array
     */
    private $roles;

    /**
     * UserDTO constructor.
     *
     * @param string $username
     * @param string $password
     * @param array  $roles
     */
    public function __construct(string $username, string $password, array $roles = [])
    {
        $this->username = $username;
        $this->password = $password;
        $this->roles = $roles;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return array
     */
    public function getRoles(): array
    {
        return $this->roles;
    }
}
