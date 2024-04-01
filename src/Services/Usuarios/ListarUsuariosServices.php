<?php


namespace App\Services\Usuarios;


use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\JsonResponse;

class ListarUsuariosServices
{
    public function __construct(
        private UserRepository $userRepository
    )
    {
    }

    public function __invoke()
    {
        $users= $this->userRepository->findAllUser();
        $respnse= new JsonResponse();
        $data=[];

        foreach ($users as $item)
        {
           $data[]=[
             'usuario'=>[
                 'id'=>$item->getId(),
                 'username'=>$item->getNickname(),
                 'password'=>$item->getPassword(),
                 'name'=>$item->getName(),
                 'created'=>$item->getCreatedOn()->format(\DateTime::RFC822)
             ]
           ];
        }
        $respnse->setData([
            'success'=>true,
            $data
        ]);
        return $respnse;
    }
}