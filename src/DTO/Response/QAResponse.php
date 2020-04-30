<?php declare(strict_types=1);

namespace App\DTO\Response;

use JMS\Serializer\Annotation as JMS;

class QAResponse
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
     * @return QAResponse
     */
    public function setQuestionId(int $questionId): QAResponse
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
     * @return QAResponse
     */
    public function setErrorMessage(string $errorMessage): QAResponse
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
     * @return QAResponse
     */
    public function setStatusCode(int $statusCode): QAResponse
    {
        $this->statusCode = $statusCode;

        return $this;
    }
}
