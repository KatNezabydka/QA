<?php declare(strict_types=1);

namespace App\Repository;

use App\Adapter\QARequestAdapter;
use App\DTO\Request\QACreateRequest;
use App\Entity\QuestionAnswer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method null|QuestionAnswer find($id, $lockMode = null, $lockVersion = null)
 * @method null|QuestionAnswer findOneBy(array $criteria, array $orderBy = null)
 * @method QuestionAnswer[]    findAll()
 * @method QuestionAnswer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class QuestionAnswerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, QuestionAnswer::class);
    }

    public function addQuestion(QACreateRequest $qaCreateRequest): ?QuestionAnswer
    {
        $em = $this->getEntityManager();

        $qa = (new QuestionAnswer())
                ->setTitle($qaCreateRequest->getTitle())
                ->setPromoted($qaCreateRequest->getPromoted())
                ->setStatus($qaCreateRequest->getStatus()->getValue())
                ->setAnswers((new qaRequestAdapter)->adaptedAnswer($qaCreateRequest));

        try {
            $em->persist($qa);
            $em->flush();

            return $qa;
        } catch (ORMException $e) {
            throw new Exception($e);
        }
    }
    // /**
    //  * @return QuestionAnswer[] Returns an array of QuestionAnswer objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('q')
            ->andWhere('q.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('q.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?QuestionAnswer
    {
        return $this->createQueryBuilder('q')
            ->andWhere('q.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
