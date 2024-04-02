<?php


namespace App\Controller\Producto;


use App\Services\Producto\ActualizarProductoServices;
use App\Services\Producto\ListarProductoServices;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class ActualizarProductoController extends AbstractController
{
    public function __construct(private ActualizarProductoServices $actualizarProductoServices)
    {
    }

    public function __invoke(string $id,Request $request)
    {

        return $this->actualizarProductoServices->__invoke($id,$request);
    }
}