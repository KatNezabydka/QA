<?php declare(strict_types=1);

namespace App\Service;

use App\DTO\Request\CreateQARequest;
use App\DTO\Response\CreateQAResponse;
use App\Entity\QuestionAnswer;
use App\Repository\QuestionAnswerRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;

class QAService implements QAServiceInterface
{
    /**
     * @var QuestionAnswerRepository
     */
    private $questionAnswerRepository;

    /**
     * QAService constructor.
     *
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->questionAnswerRepository = $entityManager->getRepository(QuestionAnswer::class);
    }

    /**
     * @param CreateQARequest $qaCreateRequest
     *
     * @return CreateQAResponse
     */
    public function save(CreateQARequest $qaCreateRequest): CreateQAResponse
    {
        $qa = $this->questionAnswerRepository->addQuestion($qaCreateRequest);

        return (new CreateQAResponse())
            ->setQuestionId($qa->getId())
            ->setStatusCode(Response::HTTP_CREATED);
    }
}
