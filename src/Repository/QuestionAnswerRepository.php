<?php declare(strict_types=1);

namespace App\Repository;

use App\Adapter\QARequestAdapter;
use App\DTO\Request\CreateQARequest;
use App\Entity\QuestionAnswer;
use App\Util\JMSSerializerAwareTrait;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method QuestionAnswer|null find($id, $lockMode = null, $lockVersion = null)
 * @method QuestionAnswer|null findOneBy(array $criteria, array $orderBy = null)
 * @method QuestionAnswer[]    findAll()
 * @method QuestionAnswer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class QuestionAnswerRepository extends ServiceEntityRepository
{
    use JMSSerializerAwareTrait;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, QuestionAnswer::class);
    }

    public function save(CreateQARequest $qaCreateRequest): QuestionAnswer
    {
        $em = $this->getEntityManager();

        $qa = (new QuestionAnswer())
            ->setTitle($qaCreateRequest->getTitle())
            ->setPromoted($qaCreateRequest->getPromoted())
            ->setStatus($qaCreateRequest->getStatus())
            ->setAnswers($this->toArray((new QARequestAdapter())->adaptedAnswer($qaCreateRequest)));

        try {
            $em->persist($qa);
            $em->flush();

            return $qa;
        } catch (ORMException $e) {
            throw new \RuntimeException($e);
        }
    }

    /**
     * @param QuestionAnswer $qa
     *
     * @return QuestionAnswer
     */
    public function update(QuestionAnswer $qa): QuestionAnswer
    {
        $em = $this->getEntityManager();

        try {
            $em->persist($qa);
            $em->flush();

            return $qa;
        } catch (ORMException $e) {
            throw new \RuntimeException($e);
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
