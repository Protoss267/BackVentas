<?php


namespace App\Security\Core\User;


use App\Entity\Users;
use App\Repository\UserRepository;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UserNotFoundException;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\PasswordUpgraderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;


class UserProvider implements UserProviderInterface, PasswordUpgraderInterface
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository=$userRepository;
    }

    public function loadUserByIdentifier(string $username): UserInterface
    {
        try {
            return $this->userRepository->findByUserOrFail($username);
        }catch (NotFoundHttpException $exception)
        {
            throw new UserNotFoundException(sprintf('Users with username %s not found',$username));
        }
    }

    public function refreshUser(UserInterface $user):UserInterface
    {
        if (!$user instanceof Users)
            throw new UnsupportedUserException(sprintf('Instance of %s not supported',get_class($user)));
        return $this->loadUserByIdentifier($user->getUsername());
    }

    public function upgradePassword(UserInterface $user, string $newHashedPassword): void
    {
        $user->setPassword($newHashedPassword);

        $this->userRepository->save($user);
    }

    public function supportsClass(string $class):bool
    {
        return Users::class===$class;
    }

    public function __call(string $name, array $arguments)
    {
        // TODO: Implement @method UserInterface loadUserByIdentifier(string $identifier)
    }

    public function loadUserByUsername(string $username)
    {
    }
}