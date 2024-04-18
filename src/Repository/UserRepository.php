<?php


namespace App\Repository;


use App\Entity\Users;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
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
    public function findByUserOrFail(string $usuario):Users
    {
        if(null === $user=$this->objectRepository->findOneBy(['nickname'=>$usuario])) {
            throw new NotFoundHttpException(sprintf('Usuario: %s no encontrado', $usuario));
        }
            return $user;
    }

    /**
     * @param string $id
     * @return Users|object
     */
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