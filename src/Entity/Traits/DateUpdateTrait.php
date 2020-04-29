<?php declare(strict_types=1);

namespace App\Entity\Traits;

use DateTime;

trait DateUpdateTrait
{
    /**
     * @var DateTime
     *
     * @ORM\Column(name="updated", type="datetime", nullable=true)
     */
    protected $updated;

    /**
     * @return DateTime
     */
    public function getUpdated(): DateTime
    {
        return $this->updated;
    }

    /**
     * @param DateTime $updated
     *
     * @return self
     */
    public function setUpdated(DateTime $updated): self
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * @ORM\PrePersist
     * @ORM\PreUpdate
     *
     * @throws \Exception
     */
    public function updateDate(): void
    {
        $this->setUpdated(new DateTime());
    }

    /**
     * @throws \Exception
     *
     * @return int
     */
    public function getDtUpdated(): int
    {
        return $this->getUpdated()->getTimestamp();
    }
}
