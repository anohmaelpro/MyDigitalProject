<?php

namespace App\Repository;

use App\Entity\DataWebsite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DataWebsite|null find($id, $lockMode = null, $lockVersion = null)
 * @method DataWebsite|null findOneBy(array $criteria, array $orderBy = null)
 * @method DataWebsite[]    findAll()
 * @method DataWebsite[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DataWebsiteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DataWebsite::class);
    }

    // /**
    //  * @return DataWebsite[] Returns an array of DataWebsite objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DataWebsite
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
