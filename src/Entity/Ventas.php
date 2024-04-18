<?php


namespace App\Entity;



use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Uid\Uuid;

class Ventas
{
    private $id;
    private Collection $items;
    private $fecha_venta;
    private $transferencia;
    private $total;


    public function __construct($transferencia)
    {
        $this->id=Uuid::v4()->toRfc4122();
        $this->fecha_venta=new \DateTime('now');
        $this->transferencia = $transferencia;
        $this->items= new ArrayCollection();
    }

    public function getItems(): ArrayCollection|Collection
    {
        return $this->items;
    }

    public function setItems(ArrayCollection|Collection $items): void
    {
        $this->items = $items;
    }

    public function getTransferencia()
    {
        return $this->transferencia;
    }

    public function setTransferencia($transferencia): void
    {
        $this->transferencia = $transferencia;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getFechaVenta()
    {
        return $this->fecha_venta;
    }

    public function getTotal()
    {
        return $this->total;
    }

    public function setTotal($total): void
    {
        $this->total = $total;
    }



}