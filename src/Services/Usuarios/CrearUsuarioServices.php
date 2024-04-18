<?php


namespace App\Services\Usuarios;


use App\Entity\Users;
use App\Repository\UserRepository;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;



class CrearUsuarioServices
{
    public function __construct(
        private UserRepository $userRepository,
        private UserPasswordEncoderInterface $encoder
    )
    {
    }

    public function __invoke(string $usuario,string $password, string $name,bool $isAdmin):Users
    {
        $persona=new Users($usuario,$name,$isAdmin);
        $encodedPassword = $this->encodePassword($this->encoder,$persona,$password);
        $persona->setPassword($encodedPassword);
        $persona->setIsAdmin($isAdmin);
        $this->userRepository->save($persona);
        return $persona;
    }

    public function encodePassword(UserPasswordEncoderInterface $encoder,$usuario,$pass)
    {
        $encodePassword=$encoder->encodePassword($usuario,$pass);
        return $encodePassword;
    }
}