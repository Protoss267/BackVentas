<?php


namespace App\Entity;


use Symfony\Component\Uid\Uuid;

class Item
{
    private string $id;
    private Producto $producto;
    private int $cantidad;

    public function __construct(int $cantidad)
    {
        $this->id=Uuid::v4()->toRfc4122();
        $this->cantidad=$cantidad;

    }

    public function getProducto(): Producto
    {
        return $this->producto;
    }

    public function setProducto(Producto $producto): void
    {
        $this->producto = $producto;
    }

    public function getId(): int|string
    {
        return $this->id;
    }


    public function getCantidad(): int
    {
        return $this->cantidad;
    }

    public function setCantidad(int $cantidad): void
    {
        $this->cantidad = $cantidad;
    }





}