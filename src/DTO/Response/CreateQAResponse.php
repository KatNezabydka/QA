<?php declare(strict_types=1);

namespace App\DTO\Response;

use JMS\Serializer\Annotation as JMS;

class CreateQAResponse
{
    /**
     * @var int
     *
     * @JMS\SerializedName("questionId")
     * @JMS\Type("integer")
     */
    private $questionId;

    /**
     * @var string
     *
     * @JMS\SerializedName("message")
     * @JMS\Type("string")
     */
    private $errorMessage;

    /**
     * @var int
     *
     * @JMS\SerializedName("code")
     * @JMS\Type("int")
     */
    private $statusCode;

    /**
     * @return int
     */
    public function getQuestionId(): int
    {
        return $this->questionId;
    }

    /**
     * @param int $questionId
     *
     * @return CreateQAResponse
     */
    public function setQuestionId(int $questionId): CreateQAResponse
    {
        $this->questionId = $questionId;

        return $this;
    }

    /**
     * @return string
     */
    public function getErrorMessage(): string
    {
        return $this->errorMessage;
    }

    /**
     * @param string $errorMessage
     *
     * @return CreateQAResponse
     */
    public function setErrorMessage(string $errorMessage): CreateQAResponse
    {
        $this->errorMessage = $errorMessage;

        return $this;
    }

    /**
     * @return int
     */
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    /**
     * @param int $statusCode
     *
     * @return CreateQAResponse
     */
    public function setStatusCode(int $statusCode): CreateQAResponse
    {
        $this->statusCode = $statusCode;

        return $this;
    }
}
