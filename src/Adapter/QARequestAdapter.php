<?php declare(strict_types=1);

namespace App\Adapter;

use App\DTO\Request\CreateQARequest;
use App\Object\AnswerObject;

class QARequestAdapter
{
    /**
     * @param CreateQARequest $createRequest
     *
     * @return AnswerObject
     */
    public function adaptedAnswer(CreateQARequest $createRequest): AnswerObject
    {
        return (new AnswerObject())
            ->setChannel($createRequest->getChannel()->getValue())
            ->setContent($createRequest->getContent());
    }
}
