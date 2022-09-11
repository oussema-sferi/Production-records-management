<?php

namespace App\Repository;

use App\Entity\F28entry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<F28entry>
 *
 * @method F28entry|null find($id, $lockMode = null, $lockVersion = null)
 * @method F28entry|null findOneBy(array $criteria, array $orderBy = null)
 * @method F28entry[]    findAll()
 * @method F28entry[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class F28entryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, F28entry::class);
    }

    public function add(F28entry $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(F28entry $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return F28entry[] Returns an array of F28entry objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('f.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?F28entry
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }

    public function getEntriesByFormId($formId)
    {
        $qb = $this->createQueryBuilder('e');
        $qb->select('e')
            ->join('e.associatedForm', 'f')
            ->where("f.id = $formId");
        return $qb->getQuery()->getResult();
    }
}
