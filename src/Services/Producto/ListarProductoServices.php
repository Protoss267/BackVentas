<?php


namespace App\Services\Producto;


use App\Repository\ProductoRepository;
use Symfony\Component\HttpFoundation\JsonResponse;

class ListarProductoServices
{
    public function __construct(private ProductoRepository $productoRepository)
    {
    }

    public function __invoke():JsonResponse
    {
        $products=$this->productoRepository->findAllProduct();
        $data=[];

        foreach ($products as $item)
        {
            $data[]=[
                'producto'=>[
                'id'=>$item->getId(),
                'codigo'=>$item->getCodigo(),
                'nombre'=>$item->getNombre(),
                'existencia'=>$item->getExistencia(),
                'fecha'=>$item->getFechaE()->format(\DateTime::RFC822),
                'updated'=>$item->getActualizado()->format(\DateTime::RFC822),
                'coste'=>$item->getPrecioI(),
                'precio'=>$item->getPrecioF(),
        ]
            ];
        }

        return new JsonResponse($data,JsonResponse::HTTP_OK);
    }
}