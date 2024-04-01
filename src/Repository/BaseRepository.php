<?php


namespace App\Repository;


use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\Connection;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectRepository;

abstract class BaseRepository
{
    private ManagerRegistry $managerRegistry;
    protected Connection $connection;
    protected ObjectRepository $objectRepository;

    public function __construct(ManagerRegistry $managerRegistry,Connection $connection)
    {
        $this->managerRegistry=$managerRegistry;
        $this->connection=$connection;
        $this->objectRepository=$this->getEntityManager()->getRepository($this->entityClass());
    }

    abstract protected static function entityClass():string;

    /**
     * @param ObjectRepository $entity
     * @throws ORMException
     * @throws OptimisticLockException
     */
    protected function saveEntity(object $entity):void
    {
        $this->getEntityManager()->persist($entity);
        $this->getEntityManager()->flush();
    }

    /**
     * @return ObjectRepository|EntityManager
     */
    public function getEntityManager()
    {

        $entityManager=$this->managerRegistry->getManager();

        if($entityManager->isOpen())
        {
            return $entityManager;
        }

        return $this->managerRegistry->resetManager();

    }
}