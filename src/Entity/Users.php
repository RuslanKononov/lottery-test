<?php

namespace App\Entity;

use App\Model\UserDTO;
use App\Model\ValueObject\UserInvoice;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UsersRepository")
 */
class Users implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=255, unique=true)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255)
     */
    private $password;

    /**
     * @var array
     *
     * @ORM\Column(name="roles", type="array")
     */
    private $roles = [];

    /**
     * @var string|null
     *
     * @ORM\Column(name="salt", type="string", length=255, nullable=true)
     */
    private $salt = null;

    /**
     * @ORM\Embedded(class="App\Model\ValueObject\UserInvoice")
     * @var UserInvoice
     */
    private $userInvoice;

    /**
     * User constructor.
     *
     * @param UserDTO $userDTO
     */
    public function __construct(UserDTO $userDTO)
    {
        $this->username = $userDTO->getUsername();
        $this->password = $userDTO->getPassword();
        $this->roles = $userDTO->getRoles();
        $this->userInvoice = new UserInvoice();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return null|string
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * @param string $username
     *
     * @return Users
     */
    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @param string $password
     *
     * @return Users
     */
    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return array
     */
    public function getRoles(): array
    {
        return $this->roles;
    }

    /**
     * @param array $roles
     *
     * @return Users
     */
    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getSalt(): ?string
    {
        return $this->salt;
    }

    /**
     * @param null|string $salt
     *
     * @return Users
     */
    public function setSalt(?string $salt = null): self
    {
        $this->salt = $salt;

        return $this;
    }

    /**
     * @return UserInvoice
     */
    public function getUserInvoice(): UserInvoice
    {
        return $this->userInvoice;
    }

    /**
     * @param UserInvoice $userInvoice
     *
     * @return Users
     */
    public function setUserInvoice(UserInvoice $userInvoice): self
    {
        $this->userInvoice = $userInvoice;

        return $this;
    }

    /**
     * @return Users
     */
    public function eraseCredentials()
    {
        return $this;
    }

    /**
     * @param UserDTO $userDTO
     *
     * @return Users
     */
    public static function create(UserDTO $userDTO): self
    {
        return new self($userDTO);
    }
}
