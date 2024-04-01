<?php


namespace App\Controller\Usuarios;


use App\Services\Usuarios\EliminarUsuarioServices;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class EliminarUsuarioController extends AbstractController
{
    public function __construct(private EliminarUsuarioServices $eliminarUsuarioServices)
    {
    }

    public function __invoke(string $id)
    {
        return new JsonResponse([$this->eliminarUsuarioServices->__invoke($id)],JsonResponse::HTTP_OK);
    }
}