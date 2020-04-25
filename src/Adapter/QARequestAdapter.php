<?php declare(strict_types=1);

namespace App\Adapter;

use App\DTO\Request\QACreateRequest;
use App\Object\AnswerObject;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Serializer;

class QARequestAdapter
{
    /**
     * @var Serializer
     */
    private $serializer;

    /**
     * QARequestAdapter constructor.
     */
    public function __construct()
    {
        $this->serializer = new Serializer(
            [new GetSetMethodNormalizer(), new ArrayDenormalizer()],
            [new JsonEncoder()]);
    }

    /**
     * @param QACreateRequest $createRequest
     * @return array
     */
    public function adaptedAnswer(QACreateRequest $createRequest): array
    {
        $answer = (new AnswerObject())
            ->setChannel($createRequest->getChannel()->getValue())
            ->setContent($createRequest->getContent());

        return [
            'channel' => $answer->getChannel(),
            'content' => $answer->getContent(),
        ];
    }
}
