<?php


namespace App\Controller\Ventas;


use App\Services\Ventas\EliminarVentasServices;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class EliminarVentasController extends AbstractController
{
    public function __construct(private EliminarVentasServices $ventasServices)
    {
    }

    public function __invoke(string $id,Request $request)
    {
        $this->ventasServices->__invoke($id,$request);

        return new JsonResponse(['message'=>'la venta se elimino correcamente'],JsonResponse::HTTP_OK);
    }
}