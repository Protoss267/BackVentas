<?php


namespace App\Services\Ventas;


use App\Entity\Item;
use App\Repository\ProductoRepository;
use App\Repository\VentasRepository;
use Symfony\Component\HttpFoundation\Request;

class EliminarVentasServices
{
    public function __construct(private VentasRepository $ventasRepository,private ProductoRepository $productoRepository)
    {
    }

    public function __invoke(string $id, Request $request)
    {
        $venta=$this->ventasRepository->findOneById($id);
        
        if ($venta)
        {
            /**
             *  @var Item $item
             */
            foreach ($venta->getItems() as $item)
            {
                $producto=$item->getProducto();
                $producto->setExistencia($producto->getExistencia()+$item->getCantidad());
                $this->productoRepository->save($producto);
            }
        }
        else{
            throw new \Exception(sprintf('la venta no existe'));
        }
        $this->ventasRepository->delete($venta);
    }
}