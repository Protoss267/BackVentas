<?php


namespace App\Controller\Usuarios;


use App\Services\Usuarios\CrearUsuarioServices;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class CrearUsuarioController extends AbstractController
{
    public function __construct(
        private CrearUsuarioServices $crearUsuarioServices
    )
    {
    }

    public function __invoke(Request $request):JsonResponse
    {
        $data=json_decode($request->getContent(),true);
        $persona=$this->crearUsuarioServices->__invoke($data['username'],$data['password'],$data['name']);

        return new JsonResponse(['usuario'=>[
            'id'=>$persona->getId(),
            'usurname'=>$persona->getNickname(),
            'name'=>$persona->getName(),
            'password'=>$persona->getPassword(),
            'created'=>$persona->getCreatedOn()->format(\DateTime::RFC822)
        ],
            ],
        JsonResponse::HTTP_CREATED
        );
    }
}