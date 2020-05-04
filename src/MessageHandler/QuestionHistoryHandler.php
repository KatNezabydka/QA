<?php declare(strict_types=1);

namespace App\MessageHandler;

use App\Entity\QuestionHistoric;
use Doctrine\ORM\EntityManagerInterface;

class QuestionHistoryHandler
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function __invoke(QuestionHistoric $questionHistory)
    {
        $this->entityManager->persist($questionHistory);

        $metaData = $this->entityManager->getClassMetadata(QuestionHistoric::class);
        $this->entityManager->getUnitOfWork()->computeChangeSet($metaData, $questionHistory);
    }

}
