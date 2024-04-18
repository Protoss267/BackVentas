<?php


namespace App\Controller\Ventas;


use App\Services\Ventas\VentasServices;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class VentasController extends AbstractController
{
    public function __construct(private VentasServices $ventasServices)
    {
    }

    public function __invoke(Request $request):JsonResponse
    {
        return $this->ventasServices->__invoke($request);
    }
}