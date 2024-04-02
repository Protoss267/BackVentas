<?php


namespace App\Controller\Producto;


use App\Services\Producto\EliminarProductoServices;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class EliminarProductoController extends AbstractController
{
    public function __construct(private EliminarProductoServices $eliminarProductoServices)
    {
    }

    public function __invoke(string $id)
    {
        if($this->eliminarProductoServices->__invoke($id))
            return new JsonResponse(['message'=>'El producto fue eliminado satisfactoriamente'],JsonResponse::HTTP_OK);
        return new JsonResponse(['message'=>'Ha ocurrido un prooblema durante el proceso'],JsonResponse::HTTP_BAD_REQUEST);
    }
}