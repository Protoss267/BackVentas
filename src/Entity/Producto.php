<?php


namespace App\Entity;


use Symfony\Component\Uid\Uuid;

class Producto
{
    private string $id;
    private string $codigo;
    private string $nombre;
    private float $precioI;
    private float $precioF;
    private \DateTime $fechaE;
    private float $existencia;
    private \DateTime $actualizado;



    public function __construct(string $codigo,string $nombre, float $precioI,float $precioF,float $existencia)
    {
        $this->id=Uuid::v4()->toRfc4122();
        $this->codigo=$codigo;
        $this->nombre=$nombre;
        $this->precioI=$precioI;
        $this->precioF=$precioF;
        $this->fechaE=new \DateTime('now');
        $this->actualizado=$this->markAsUpdate();
        $this->existencia=$existencia;
    }


    public function getId(): string
    {
        return $this->id;
    }


    public function getCodigo(): string
    {
        return $this->codigo;
    }


    public function setCodigo(string $codigo): void
    {
        $this->codigo = $codigo;
    }


    public function getNombre(): string
    {
        return $this->nombre;
    }


    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }


    public function getPrecioI(): float
    {
        return $this->precioI;
    }


    public function setPrecioI(float $precioI): void
    {
        $this->precioI = $precioI;
    }


    public function getPrecioF(): float
    {
        return $this->precioF;
    }


    public function setPrecioF(float $precioF): void
    {
        $this->precioF = $precioF;
    }


    public function getFechaE(): \DateTime
    {
        return $this->fechaE;
    }



    public function getExistencia(): float
    {
        return $this->existencia;
    }


    public function setExistencia(float $existencia): void
    {
        $this->existencia = $existencia;
    }

    public function getActualizado(): \DateTime
    {
        return $this->actualizado;
    }

    public function markAsUpdate(): \DateTime
    {
        return $this->actualizado = new \DateTime('now');
    }


}