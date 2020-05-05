<?php declare(strict_types=1);

namespace App\Service;

use App\Entity\QuestionHistoric;
use App\Repository\QuestionHistoricRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Doctrine\Persistence\ObjectRepository;

class QuestionHistoryExporter implements QuestionHistoryExporterInterface
{
    /**
     * @var ObjectRepository|QuestionHistoricRepository
     */
    private QuestionHistoricRepository $questionHistoryRepository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->questionHistoryRepository = $entityManager->getRepository(QuestionHistoric::class);
    }

    public function iterate(): ?\Generator
    {
        $query = $this->questionHistoryRepository->historyQueryBuilder();

        $paginator = new Paginator($query);

        foreach ($paginator as $item) {
            yield $item;
        }
    }
}
