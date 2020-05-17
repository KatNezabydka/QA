<?php declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\QuestionHistoricRepository")
 * @ORM\Table(name="question_historic")
 */
class QuestionHistoric
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private ?int $id;

    /**
     * @ORM\Column(type="integer")
     */
    private ?int $questionId;

    /**
     * @ORM\Column(type="datetime")
     */
    private ?\DateTimeInterface $changeDate;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $fieldName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $changedFrom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $changedTo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuestionId(): ?int
    {
        return $this->questionId;
    }

    public function setQuestionId(int $questionId): self
    {
        $this->questionId = $questionId;

        return $this;
    }

    public function getChangeDate(): ?\DateTimeInterface
    {
        return $this->changeDate;
    }

    public function setChangeDate(\DateTimeInterface $changeDate): self
    {
        $this->changeDate = $changeDate;

        return $this;
    }

    public function getFieldName(): ?string
    {
        return $this->fieldName;
    }

    public function setFieldName(string $fieldName): self
    {
        $this->fieldName = $fieldName;

        return $this;
    }

    public function getChangedFrom(): ?string
    {
        return $this->changedFrom;
    }

    public function setChangedFrom(string $changedFrom): self
    {
        $this->changedFrom = $changedFrom;

        return $this;
    }

    public function getChangedTo(): ?string
    {
        return $this->changedTo;
    }

    public function setChangedTo(string $changedTo): self
    {
        $this->changedTo = $changedTo;

        return $this;
    }
}
