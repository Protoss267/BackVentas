<?php


namespace App\Services\Usuarios;


use App\Repository\UserRepository;

class GetUsuarioServices
{
    public function __construct(private UserRepository $repository)
    {
    }
    public function __invoke(string $id)
    {
       return $this->repository->findOneById($id);
    }
}