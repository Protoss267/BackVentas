<?php


namespace App\Controller\Usuarios;


use App\Services\Usuarios\ActualizarUsuarioServices;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ActualizarUsuarioController extends AbstractController
{
    public function __construct(private ActualizarUsuarioServices $actualizarUsuarioServices)
    {
    }

    public function __invoke(Request $request,string $id)
    {
        $data=json_decode($request->getContent(),true);
        $user=$this->actualizarUsuarioServices->__invoke($id,$data['username'],$data['password'],$data['name'],$data['isAdmin']);

        return new JsonResponse(['user'=>[
            'id'=>$user->getId(),
            'nombre'=>$user->getName(),
            'username'=>$user->getNickname(),
            'isAdmin'=>$user->getIsAdmin(),
            'password'=>$user->getPassword(),
            'created'=>$user->getCreatedOn()->format(\DateTime::RFC1123),
            'updated'=>$user->getUpdateOn()->format(\DateTime::RFC822)
        ]],JsonResponse::HTTP_OK);
    }
}