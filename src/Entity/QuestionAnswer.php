<?php

namespace App\Entity;

use App\Entity\Traits\DatesTrait;
use Doctrine\ORM\Mapping as ORM;

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

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getPromoted(): ?bool
    {
        return $this->promoted;
    }

    public function setPromoted(bool $promoted): self
    {
        $this->promoted = $promoted;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     *
     * @return QuestionAnswer
     */
    public function setStatus($status): QuestionAnswer
    {
        $this->status = $status;

        return $this;
    }

    public function getAnswers(): ?array
    {
        return $this->answers;
    }

    public function setAnswers(?array $answers): self
    {
        $this->answers = $answers;

        return $this;
    }
}
