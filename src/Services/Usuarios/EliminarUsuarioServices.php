<?php


namespace App\Services\Usuarios;


use App\Entity\Users;
use App\Repository\UserRepository;

class EliminarUsuarioServices
{
    public function __construct(private UserRepository $userRepository)
    {
    }

    public function __invoke(string $id)
    {
         $user=$this->userRepository->findOneById($id);
        if ($user)
        {
            /** @var Users $user */
            $this->userRepository->delete($user);

            return ['message'=>'Usuario %s eliminado satifactoriamente',$user];
        }

        return ['message'=>'El usuario no existe'];
    }
}