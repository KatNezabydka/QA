<?php declare(strict_types=1);

namespace App\Controller\Api;

use App\DTO\Request\QACreateRequest;
use App\Entity\QuestionAnswer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api")
 */
class ApiQAController extends AbstractController
{
    /**
     * @Route("/qa/{id}", methods="GET", name="qa_get")
     * @param QuestionAnswer $questionAnswer
     * @return Response
     */
    public function getQAAction(QuestionAnswer $questionAnswer): Response
    {
        return $this->json(['questionAnswer' => $questionAnswer], Response::HTTP_OK);
    }

    /**
     * @Route("/qa", methods="POST", name="qa_new")
     *
     * @param QACreateRequest $qaCreateRequest
     * @return Response
     */
    public function saveQAAction(QACreateRequest $qaCreateRequest): Response
    {
        return  $this->json(['qaCreateRequest' => $qaCreateRequest], Response::HTTP_OK);
    }
}
