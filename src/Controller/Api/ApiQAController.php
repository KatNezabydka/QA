<?php declare(strict_types=1);

namespace App\Controller\Api;

use App\DTO\Request\CreateQARequest;
use App\DTO\Request\UpdateQARequest;
use App\DTO\Response\QAResponse;
use App\Entity\QuestionAnswer;
use App\Service\QAService;
use App\Util\JMSSerializerAwareTrait;
use App\Util\LoggerAwareTrait;
use App\Util\ValidatorAwareTrait;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api")
 */
class ApiQAController extends AbstractController
{
    use JMSSerializerAwareTrait;
    use ValidatorAwareTrait;
    use LoggerAwareTrait;

    /**
     * @Route("/qa/{id}", methods="GET", name="qa_get", requirements={"id": "\d+"})
     *
     * @param QuestionAnswer $questionAnswer
     *
     * @return Response
     */
    public function getQAAction(QuestionAnswer $questionAnswer): Response
    {
        return $this->json($questionAnswer, Response::HTTP_OK);
    }

    /**
     * @Route("/qa/{id}", methods="PUT", name="qa_update", requirements={"id": "\d+"})
     *
     * @param QuestionAnswer  $questionAnswer
     * @param UpdateQARequest $qaUpdateRequest
     * @param QAService       $questionAnswerService
     *
     * @return Response
     */
    public function updateQAAction(
        QuestionAnswer $questionAnswer,
        UpdateQARequest $qaUpdateRequest,
        QAService $questionAnswerService
    ): Response {
        $errors = $this->validateAndGetErrors($qaUpdateRequest);

        if (!empty($errors)) {
            $this->info('Create QA', [
                'response' => $errors,
            ]);

            $response = (new QAResponse())
                ->setErrorMessage($errors)
                ->setStatusCode(Response::HTTP_BAD_REQUEST);

            return $this->json($this->toArray($response), $response->getStatusCode());
        }

        $response = $questionAnswerService->update($qaUpdateRequest, $questionAnswer);

        return $this->json($this->toArray($response), $response->getStatusCode());
    }

    /**
     * @Route("/qa", methods="POST", name="qa_new")
     *
     * @param CreateQARequest $qaCreateRequest
     * @param QAService       $questionAnswerService
     *
     * @return Response
     */
    public function saveQAAction(
        CreateQARequest $qaCreateRequest,
        QAService $questionAnswerService
    ): Response {
        $errors = $this->validateAndGetErrors($qaCreateRequest);
        if (!empty($errors)) {
            $this->info('Create QA', [
                'response' => $errors,
            ]);

            $response = (new CreateQAResponse())
                ->setErrorMessage($errors)
                ->setStatusCode(Response::HTTP_BAD_REQUEST);

            return $this->json($this->toArray($response), $response->getStatusCode());
        }

        $response = $questionAnswerService->save($qaCreateRequest);

        return $this->json($this->toArray($response), $response->getStatusCode());
    }
}
