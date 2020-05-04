<?php declare(strict_types=1);

namespace App\Service;

use App\DTO\Request\CreateQARequest;
use App\DTO\Request\UpdateQARequest;
use App\DTO\Response\QAResponse;
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
     * @return QAResponse
     */
    public function save(CreateQARequest $qaCreateRequest): QAResponse
    {
        $qa = $this->questionAnswerRepository->save($qaCreateRequest);

        return (new QAResponse())
            ->setQuestionId($qa->getId())
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function update(UpdateQARequest $qaUpdateRequest, QuestionAnswer $questionAnswer): QAResponse
    {
        $questionAnswer->updateFromQuestionQARequest($qaUpdateRequest);
        $qa = $this->questionAnswerRepository->update($questionAnswer);

        return (new QAResponse())
            ->setQuestionId($qa->getId())
            ->setStatusCode(Response::HTTP_OK);
    }
}
