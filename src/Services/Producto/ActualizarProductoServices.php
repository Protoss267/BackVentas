<?php


namespace App\Services\Producto;


use App\Repository\ProductoRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ActualizarProductoServices
{
    public function __construct(private ProductoRepository $productoRepository)
    {
    }

    public function __invoke(string $id,Request $request):JsonResponse
    {
        $producto=$this->productoRepository->findById($id);
        $data=json_decode($request->getContent(),true);
        if($producto)
        {
            $producto->setNombre($data['nombre']);
            $producto->setPrecioI($data['precioI']);
            $producto->setPrecioF($data['precioF']);
            $producto->setExistencia($data['total']);
            $this->productoRepository->save($producto);

            return new JsonResponse(['El producto se actualizo correctamente',
                ['producto'=>[
                    'id'=>$producto->getId(),
                    'codigo'=>$producto->getCodigo(),
                    'nombre'=>$producto->getNombre(),
                    'existencia'=>$producto->getExistencia(),
                    'fecha'=>$producto->getFechaE()->format(\DateTime::RFC822),
                    'updated'=>$producto->getActualizado()->format(\DateTime::RFC822),
                    'coste'=>$producto->getPrecioI(),
                    'precio'=>$producto->getPrecioF(),
                ]]
                ],JsonResponse::HTTP_OK);
        }
        else{
            throw new \Exception(sprintf('EL producto no existe '));
        }

    }
}