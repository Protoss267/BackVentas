<?php


namespace App\Controller\Usuarios;


use App\Services\Usuarios\ListarUsuariosServices;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ListarUsuariosController extends AbstractController
{
    public function __construct(
        private ListarUsuariosServices $listarUsuariosServices
    )
    {
    }

    public function __invoke()
    {
        return $this->listarUsuariosServices->__invoke();
    }
}