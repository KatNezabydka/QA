<?php

namespace App\Entity;

use App\Entity\Traits\DateUpdateTrait;
use Doctrine\ORM\Mapping as ORM;
use Elao\Enum\Enum;

/**
 * @ORM\Entity(repositoryClass="App\Repository\QuestionHistoricRepository")
 * @ORM\Table(name="question_historic")
 * @ORM\HasLifecycleCallbacks
 */
class QuestionHistoric
{
    use DateUpdateTrait;
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @ORM\Column(type="status", length=255, nullable=true)
     */
    private $status;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     *
     * @return $this
     */
    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return Enum
     */
    public function getStatus(): ?Enum
    {
        return $this->status;
    }

    /**
     * @param Enum $status
     *
     * @return $this
     */
    public function setStatus(Enum $status): self
    {
        $this->status = $status;

        return $this;
    }
}
