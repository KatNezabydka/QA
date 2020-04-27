<?php declare(strict_types=1);

namespace App\Adapter;

use App\DTO\Request\QACreateRequest;
use App\Object\AnswerObject;
use App\Util\JMSSerializerAwareTrait;

class QARequestAdapter
{
    use JMSSerializerAwareTrait;

    /**
     * @param QACreateRequest $createRequest
     * @return array
     */
    public function adaptedAnswer(QACreateRequest $createRequest): array
    {
        $answer = (new AnswerObject())
            ->setChannel($createRequest->getChannel()->getValue())
            ->setContent($createRequest->getContent());

        $eee = $this->toArray($answer);

        dd($eee);

        return [
            'channel' => $answer->getChannel(),
            'content' => $answer->getContent(),
        ];
    }
}
