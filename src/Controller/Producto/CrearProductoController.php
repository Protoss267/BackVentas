<?php


namespace App\Controller\Producto;


use App\Services\Producto\CrearProductoServices;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class CrearProductoController extends AbstractController
{
    public function __construct(private CrearProductoServices $crearProductoServices)
    {
    }

    public function __invoke(Request $request)
    {
        $producto=$this->crearProductoServices->__invoke($request);

        return new JsonResponse(['producto'=>[
            'id'=>$producto->getId(),
            'codigo'=>$producto->getCodigo(),
            'nombre'=>$producto->getNombre(),
            'existencia'=>$producto->getExistencia(),
            'fecha'=>$producto->getFechaE(),
            'updated'=>$producto->getActualizado(),
            'coste'=>$producto->getPrecioI(),
            'precio'=>$producto->getPrecioF(),
        ]],JsonResponse::HTTP_CREATED);
    }
}