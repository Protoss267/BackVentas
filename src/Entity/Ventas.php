<?php


namespace App\Entity;



use Doctrine\Common\Collections\Collection;
use Symfony\Component\Uid\Uuid;

class Ventas
{
    private string $id;
    private \DateTime $fecha_Creada;
    private bool $tranferencia;
    private Collection $productos;
    private float $importeTotal;
    private \DateTime $updated;

       /**
     * Ventas constructor.
     * @param \DateTime $fecha_Creada
     * @param bool $tranferencia
     * @param Collection $productos
     * @param float $importeTotal
     */
    public function __construct(\DateTime $fecha_Creada, bool $tranferencia, Collection $productos, float $importeTotal)
    {
        $this->id=Uuid::v4()->toRfc4122();
        $this->fecha_Creada = new \DateTime('now');
        $this->tranferencia = $tranferencia;
        $this->productos = $productos;
        $this->importeTotal = $importeTotal;
        $this->markAsUpdated();
    }


    public function getId(): string
    {
        return $this->id;
    }


    public function getFechaRealizada(): \DateTime
    {
        return $this->fecha_Creada;
    }


    public function isTranferencia(): bool
    {
        return $this->tranferencia;
    }


    public function setTranferencia(bool $tranferencia): void
    {
        $this->tranferencia = $tranferencia;
    }


    public function getProductos(): Collection
    {
        return $this->productos;
    }


    public function setProductos(Collection $productos): void
    {
        $this->productos = $productos;
    }


    public function getImporteTotal(): float
    {
        return $this->importeTotal;
    }


    public function setImporteTotal(float $importeTotal): void
    {
        $this->importeTotal = $importeTotal;
    }


    public function getUpdated(): \DateTime
    {
        return $this->updated;
    }


    public function markAsUpdated(): \DateTime
    {
       return $this->updated = new \DateTime('now');
    }



}