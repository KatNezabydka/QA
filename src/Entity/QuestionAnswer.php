<?php declare(strict_types=1);

namespace App\Entity;

use App\DTO\Request\RequestDTOInterface;
use App\Entity\Traits\DateCreateTrait;
use App\Entity\Traits\DateUpdateTrait;
use Doctrine\ORM\Mapping as ORM;
use Elao\Enum\EnumInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\QuestionAnswerRepository")
 * @ORM\Table(name="question_answer")
 * @ORM\HasLifecycleCallbacks
 */
class QuestionAnswer
{
    use DateCreateTrait;
    use DateUpdateTrait;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $title;

    /**
     * @ORM\Column(type="boolean")
     */
    private bool $promoted;

    /**
     * @ORM\Column(type="status")
     */
    private EnumInterface $status;

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
     *
     * @return self
     */
    public function setId($id): self
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
     *
     * @return self
     */
    public function setTitle($title): self
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
     *
     * @return self
     */
    public function setPromoted($promoted): self
    {
        $this->promoted = $promoted;

        return $this;
    }

    /**
     * @return EnumInterface
     */
    public function getStatus(): EnumInterface
    {
        return $this->status;
    }

    /**
     * @param EnumInterface $status
     *
     * @return self
     */
    public function setStatus(EnumInterface $status): self
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
     *
     * @return self
     */
    public function setAnswers(array $answers): self
    {
        $this->answers = $answers;

        return $this;
    }

    /**
     * @param RequestDTOInterface $requestDTO
     *
     * @return $this
     */
    public function updateFromQuestionQARequest(RequestDTOInterface $requestDTO): self
    {
        if ($requestDTO->hasTitle()) {
            $this->title = $requestDTO->getTitle();
        }

        if ($requestDTO->hasStatus()) {
            $this->status = $requestDTO->getStatus();
        }

        return $this;
    }
}
