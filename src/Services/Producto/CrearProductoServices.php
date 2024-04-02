<?php


namespace App\Services\Producto;


use App\Entity\Producto;
use App\Repository\ProductoRepository;
use Symfony\Component\HttpFoundation\Request;

class CrearProductoServices
{
    public function __construct(private ProductoRepository $productoRepository)
    {
    }

    public function __invoke(Request $request):Producto
    {
        $data=json_decode($request->getContent(),true);
        $producto= new Producto($data['codigo'],$data['nombre'],$data['precioI'],$data['precioF'],$data['total']);
        $this->productoRepository->save($producto);

        return $producto;
    }
}