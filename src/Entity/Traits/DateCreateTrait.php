<?php declare(strict_types=1);

namespace App\Entity\Traits;

use DateTime;

trait DateCreateTrait
{
    /**
     * @var DateTime
     *
     * @ORM\Column(name="created", type="datetime", nullable=true)
     */
    protected $created;

    /**
     * @return DateTime
     */
    public function getCreated(): DateTime
    {
        return $this->created;
    }

    /**
     * @param DateTime $created
     *
     * @return self
     */
    public function setCreated(DateTime $created): self
    {
        $this->created = $created;

        return $this;
    }

    /**
     * @ORM\PrePersist
     *
     * @throws \Exception
     */
    public function createDate(): void
    {
        $this->setCreated(new DateTime());
    }

    /**
     * @return int
     */
    public function getDtCreated(): int
    {
        return $this->getCreated()->getTimestamp();
    }
}
