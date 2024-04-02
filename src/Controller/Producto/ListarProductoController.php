<?php


namespace App\Controller\Producto;


use App\Services\Producto\ListarProductoServices;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ListarProductoController extends AbstractController
{
    public function __construct(private ListarProductoServices $listarProductoServices)
    {
    }

    public function __invoke()
    {
        return $this->listarProductoServices->__invoke();
    }
}