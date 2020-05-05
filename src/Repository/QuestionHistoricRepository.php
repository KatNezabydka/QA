<?php

namespace App\Repository;

use App\Entity\QuestionHistoric;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method QuestionHistoric|null find($id, $lockMode = null, $lockVersion = null)
 * @method QuestionHistoric|null findOneBy(array $criteria, array $orderBy = null)
 * @method QuestionHistoric[]    findAll()
 * @method QuestionHistoric[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class QuestionHistoricRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, QuestionHistoric::class);
    }

    public function historyQueryBuilder(): QueryBuilder
    {
        $qb = $this->createQueryBuilder('qh');

        return $qb
            ->setMaxResults(20)
            ->orderBy('qh.changeDate', 'DESC');
    }
}
