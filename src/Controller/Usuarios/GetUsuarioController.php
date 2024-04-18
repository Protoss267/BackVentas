<?php


namespace App\Controller\Usuarios;


use App\Services\Usuarios\GetUsuarioServices;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class GetUsuarioController extends AbstractController
{
    public function __construct(private GetUsuarioServices $getUsuarioServices)
    {
    }
    public function __invoke(string $id)
    {
        $user=$this->getUsuarioServices->__invoke($id);

        return new JsonResponse(['data'=>$user],JsonResponse::HTTP_OK);
    }
}