<?php


namespace App\Services\Producto;


use App\Repository\ProductoRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class GetProductoServices
{
    public function __construct(private ProductoRepository $productoRepository)
    {
    }

    public function __invoke(Request $request,string $id)
    {
        $producto=$this->productoRepository->findByCodigo($id);
        if($producto)
        {
            return new JsonResponse([
                'id'=>$producto->getId(),
                'codigo'=>$producto->getCodigo(),
                'nombre'=>$producto->getNombre(),
                'existencia'=>$producto->getExistencia(),
                'precio'=>$producto->getPrecioF(),
            ],JsonResponse::HTTP_OK);
        }
        else
            return new JsonResponse(['El producto no se encontro,al parecer el codigo no existe en el sistema'],
                JsonResponse::HTTP_BAD_REQUEST);
    }
}