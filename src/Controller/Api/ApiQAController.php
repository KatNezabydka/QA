<?php declare(strict_types=1);

namespace App\Controller\Api;

use App\DTO\Request\QACreateRequest;
use App\Entity\QuestionAnswer;
use App\Service\QAService;
use App\Util\LoggerAwareTrait;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api")
 */
class ApiQAController extends AbstractController
{
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
     * @param QACreateRequest $qaCreateRequest
     * @param QAService       $questionAnswerService
     *
     * @throws Exception
     *
     * @return Response
     */
    public function saveQAAction(
        QACreateRequest $qaCreateRequest,
        QAService $questionAnswerService
    ): Response {
        $response = $questionAnswerService->save($qaCreateRequest);

        return  $this->json($response->getContent(), Response::HTTP_OK);
    }
}
