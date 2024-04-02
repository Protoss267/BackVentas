<?php


namespace App\Repository;


use App\Entity\Producto;

class ProductoRepository extends BaseRepository
{

    protected static function entityClass(): string
    {
        return Producto::class;
    }

    public function save(Producto $producto):void
    {
        $this->saveEntity($producto);
    }

    public function findAllProduct():array
    {
        return $this->objectRepository->findAll();
    }

    public function findById(string $id):?object
    {
        return $this->objectRepository->find($id);
    }

    public function delete(Producto $producto)
    {
        $em=$this->getEntityManager();

        $em->remove($producto);
        $em->flush();
    }
}