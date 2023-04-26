<?php

namespace App\Repository;

use App\Entity\PlayableClass;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PlayableClass>
 *
 * @method PlayableClass|null find($id, $lockMode = null, $lockVersion = null)
 * @method PlayableClass|null findOneBy(array $criteria, array $orderBy = null)
 * @method PlayableClass[]    findAll()
 * @method PlayableClass[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlayableClassRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PlayableClass::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(PlayableClass $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(PlayableClass $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @return PlayableClass Returns PlayableClass object
     */
    public function findRandomTwo()
    {
        // For using rand from doctrine extension we need to use DQL
        $em = $this->getEntityManager();
        $query = $em->createQuery('SELECT classEntity
            FROM App\Entity\PlayableClass classEntity
            ORDER BY RAND()
            ')
            ->setMaxResults(2);

        return $query->getResult();
    }

    public function findFiveLast()
    {
        return $this->createQueryBuilder('p')
            ->orderBy('p.id', 'DESC')
            ->getQuery()
            ->setMaxResults(5)
            ->getResult()
        ;
    }

    /*
    public function findOneBySomeField($value): ?PlayableClass
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
