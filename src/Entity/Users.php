<?php


namespace App\Entity;


use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Uid\Uuid;


/**
 * @method string getUserIdentifier()
 */
class Users implements UserInterface,PasswordAuthenticatedUserInterface
{
    private string $id;

    private string $nickname;

    private string $password;

    private string $name;

    private bool $isAdmin;

    private \DateTime $created_on;

    private \DateTime $update_on;

    public function __construct(string $nickname,string $name, bool $isAdmin=false)
    {
        $this->id=Uuid::v4()->toRfc4122();
        $this->nickname=$nickname;
        $this->name=$name;
        $this->isAdmin=$isAdmin;
        $this->created_on = new \DateTime('now');
        $this->markAsUpdated();
    }


    public function getIsAdmin(): bool
    {
        return $this->isAdmin;
    }

    public function setIsAdmin(bool $isAdmin): void
    {
        $this->isAdmin = $isAdmin;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getNickname(): string
    {
        return $this->nickname;
    }

    public function setNickname(string $nickname): void
    {
        $this->nickname = $nickname;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }


    public function getCreatedOn(): \DateTime
    {
        return $this->created_on;
    }

    public function getUpdateOn(): \DateTime
    {
        return $this->update_on;
    }

    public function markAsUpdated(): \DateTime
    {
        return $this->update_on =new \DateTime('now');
    }


    public function getRoles():array
    {
        return [];
    }

    public function getSalt():void
    {
    }

    public function eraseCredentials():void
    {
    }

    public function getUsername():string
    {
        return $this->getName();
    }
    /**
     * @method string getUserIdentifier()
     */

    public function __call(string $name, array $arguments):void
    {
    }
}