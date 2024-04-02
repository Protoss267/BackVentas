<?php


namespace App\Services\Producto;


use App\Repository\ProductoRepository;
use Doctrine\DBAL\Driver\PDO\Exception;

class EliminarProductoServices
{
    public function __construct(private ProductoRepository $productoRepository)
    {
    }

    public function __invoke(string $id)
    {
        $producto=$this->productoRepository->findById($id);
        if (!$producto)
        {
            return ['message'=>'El producto a eliminar no existe'];
        }
        else
        {
            $this->productoRepository->delete($producto);
           return ['message'=>'Usuario %s eliminado satifactoriamente',$producto];
        }
    }
}