<?php


namespace App\Services\Ventas;


use App\Entity\Item;
use App\Entity\Ventas;
use App\Repository\ProductoRepository;
use App\Repository\VentasRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class VentasServices
{
    public function __construct(private VentasRepository $ventasRepository,private ProductoRepository $productoRepository
    )
    {
    }

    public function __invoke(Request $request)
    {
        $items=[];
        $totalV=0.0;
        $data=json_decode($request->getContent(),true);
        foreach ($data['productos'] as $elem) {
            $producto = $this->productoRepository->findByCodigo($elem['codigo']);
            $item = new Item($elem['cantidad']);
            $item->setProducto($producto);
            $items[]=$item;
        }
        foreach ($items as $item)
        {
            $totalV+=$item->getProducto()->getPrecioF()*$item->getCantidad();
            $item->getProducto()->setExistencia($item->getProducto()->getExistencia()-$item->getCantidad());
            $this->productoRepository->save($item->getProducto());
        }

       $venta=new Ventas($data['transferencia']);
        $venta->setTotal($totalV);
        $elementos= new ArrayCollection($items);
        $venta->setItems($elementos);
        $this->ventasRepository->save($venta);

        dd($venta);

        return new JsonResponse(['message'=>'Venta Exitosa'],JsonResponse::HTTP_OK);
    }
}