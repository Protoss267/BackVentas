<?php


namespace App\Repository;


use App\Entity\Users;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;

class UserRepository extends BaseRepository
{



    protected static function entityClass(): string
    {
        return Users::class;
    }

    /**
     * @param string $usuario
     * @return Users|object
     */
    public function findByUserOrFail(string $usuario)
    {
        if(null === $user=$this->objectRepository->findOneBy(['nickname'=>$usuario]))
        {
            throw new UnsupportedUserException(sprintf('Usuario: %s no encontrado',$usuario));
        }
        else
            return $user;
    }

    public function findOneById(string $id): object
    {
        $object=$this->objectRepository->find($id);

            return $object;




    }

    public function findAllUser()
    {
        return $this->objectRepository->findAll();
    }

    public function delete(Users $users)
    {
        $em=$this->getEntityManager();

         $em->remove($users);
         $em->flush();
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function save(Users $user)
    {
        $this->saveEntity($user);
    }
}