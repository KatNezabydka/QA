<?php

namespace App\Service;

use App\DTO\Request\CreateQARequest;
use App\DTO\Request\UpdateQARequest;
use App\DTO\Response\QAResponse;
use App\Entity\QuestionAnswer;

interface QAServiceInterface
{
    /**
     * @param CreateQARequest $qaCreateRequest
     *
     * @return QAResponse
     */
    public function save(CreateQARequest $qaCreateRequest): QAResponse;

    /**
     * @param UpdateQARequest $qaCreateRequest
     * @param QuestionAnswer  $questionAnswer
     *
     * @return QAResponse
     */
    public function update(UpdateQARequest $qaCreateRequest, QuestionAnswer $questionAnswer): QAResponse;
}
