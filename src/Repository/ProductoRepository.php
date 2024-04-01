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
}