<?php declare(strict_types=1);

namespace App\Service;

use App\DTO\Request\QACreateRequest;
use App\Entity\QuestionAnswer;
use App\Repository\QuestionAnswerRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;

class QAService
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * @var QuestionAnswerRepository
     */
    private $questionAnswerRepository;

    /**
     * QuestionAnswerService constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->questionAnswerRepository = $entityManager->getRepository(QuestionAnswer::class);
    }

    /**
     * @param QACreateRequest $qaCreateRequest
     * @return Response
     */
    public function save(QACreateRequest $qaCreateRequest): Response
    {
      $qa = $this->questionAnswerRepository->addQuestion($qaCreateRequest);

       return Response::create($qa->getId(), Response::HTTP_CREATED);
    }
}
