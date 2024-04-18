<?php


namespace App\Repository;


use App\Entity\Ventas;

class VentasRepository extends BaseRepository
{

    protected static function entityClass(): string
    {
        return Ventas::class;

    }

    public function save(Ventas $ventas):void
    {
        $this->saveEntity($ventas);
    }

    /**
     * @param string $id
     * @return Ventas
     */
    public function findOneById(string $id)
    {
        return $this->objectRepository->findOneBy(['id'=>$id]);
    }

    public function delete(Ventas $ventas)
    {
        $em=$this->getEntityManager();

        $em->remove($ventas);
        $em->flush();
    }
}