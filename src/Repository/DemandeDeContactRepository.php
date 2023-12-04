<?php

namespace App\Repository;

use App\Entity\DemandeDeContact;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DemandeDeContact>
 *
 * @method DemandeDeContact|null find($id, $lockMode = null, $lockVersion = null)
 * @method DemandeDeContact|null findOneBy(array $criteria, array $orderBy = null)
 * @method DemandeDeContact[]    findAll()
 * @method DemandeDeContact[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DemandeDeContactRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DemandeDeContact::class);
    }

//    /**
//     * @return DemandeDeContact[] Returns an array of DemandeDeContact objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('d.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?DemandeDeContact
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
