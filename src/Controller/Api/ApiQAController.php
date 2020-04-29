<?php declare(strict_types=1);

namespace App\Controller\Api;

use App\DTO\Request\CreateQARequest;
use App\DTO\Response\CreateQAResponse;
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
