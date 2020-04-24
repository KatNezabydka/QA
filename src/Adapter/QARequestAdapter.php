<?php declare(strict_types=1);

namespace App\Adapter;

use App\DTO\Request\QACreateRequest;
use App\Object\AnswerObject;
use Symfony\Component\Serializer\SerializerInterface;

class QARequestAdapter
{
    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * QARequestAdapter constructor.
     * @param SerializerInterface $serializer
     */
    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
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

        $this->serializer->serialize($answer, 'json');
    }
}
