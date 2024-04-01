<?php


namespace App\Services\Usuarios;


use App\Entity\Users;
use App\Repository\UserRepository;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ActualizarUsuarioServices
{
    public function __construct(private UserRepository $userRepository,private UserPasswordEncoderInterface $encoder)
    {
    }

    public function __invoke(string $id,string $usuario,string $password,string $name):Users
    {
        $user=$this->userRepository->findOneById($id);
        if($user)
        {
            $user->setNickname($usuario);
            $encodedPassword = $this->encodePassword($this->encoder,$user,$user->getPassword());
            $user->setPassword($encodedPassword);
            $user->setName($name);
            $this->userRepository->save($user);

        }else
            throw new \Exception(sprintf('EL usuario %s no existe ',$usuario));
        return $user;
    }

    public function encodePassword(UserPasswordEncoderInterface $encoder,$usuario,$pass)
    {
        $encodePassword=$encoder->encodePassword($usuario,$pass);
        return $encodePassword;
    }
}