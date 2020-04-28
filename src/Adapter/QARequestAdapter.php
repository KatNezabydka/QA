<?php declare(strict_types=1);

namespace App\Adapter;

use App\DTO\Request\QACreateRequest;
use App\Object\AnswerObject;

class QARequestAdapter
{

    /**
     * @param QACreateRequest $createRequest
     * @return AnswerObject
     */
    public function adaptedAnswer(QACreateRequest $createRequest): AnswerObject
    {
        return (new AnswerObject())
            ->setChannel($createRequest->getChannel()->getValue())
            ->setContent($createRequest->getContent());
    }
}
