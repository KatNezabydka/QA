<?php

namespace App\Entity;

use App\Entity\Traits\DatesTrait;
use Doctrine\ORM\Mapping as ORM;
use Elao\Enum\Enum;

/**
 * @ORM\Entity(repositoryClass="App\Repository\QuestionAnswerRepository")
 * @ORM\Table(name="question_answer")
 * @ORM\HasLifecycleCallbacks
 */
class QuestionAnswer
{
    use DatesTrait;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="boolean")
     */
    private $promoted;

    /**
     * @ORM\Column(type="status")
     */
    private $status;

    /**
     * @var array
     *
     * @ORM\Column(type="jsonb", nullable=true)
     */
    private $answers = [];

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return QuestionAnswer
     */
    public function setId($id): QuestionAnswer
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     * @return QuestionAnswer
     */
    public function setTitle($title): QuestionAnswer
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return bool
     */
    public function getPromoted(): bool
    {
        return $this->promoted;
    }

    /**
     * @param mixed $promoted
     * @return QuestionAnswer
     */
    public function setPromoted($promoted): QuestionAnswer
    {
        $this->promoted = $promoted;
        return $this;
    }

    /**
     * @return Enum
     */
    public function getStatus(): Enum
    {
        return $this->status;
    }

    /**
     * @param Enum $status
     * @return QuestionAnswer
     */
    public function setStatus($status): QuestionAnswer
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return array
     */
    public function getAnswers(): array
    {
        return $this->answers;
    }

    /**
     * @param array $answers
     * @return QuestionAnswer
     */
    public function setAnswers(array $answers): QuestionAnswer
    {
        $this->answers = $answers;
        return $this;
    }
}
