<?php declare(strict_types=1);

namespace App\Entity\Traits;

trait DatesTrait
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime", nullable=true)
     */
    protected $created;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated", type="datetime", nullable=true)
     */
    protected $updated;

    /**
     * @return \DateTime
     */
    public function getCreated(): \DateTime
    {
        return $this->created;
    }

    /**
     * @param \DateTime $created
     * @return self
     */
    public function setCreated(\DateTime $created): self
    {
        $this->created = $created;

        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getUpdated(): ?\DateTime
    {
        return $this->updated;
    }

    /**
     * @param \DateTime $updated
     * @return self
     */
    public function setUpdated(\DateTime $updated): self
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * @ORM\PrePersist
     *
     * @throws \Exception
     */
    public function createDate(): void
    {
        $this->setCreated(new \DateTime());
    }

    /**
     * @ORM\PrePersist
     * @ORM\PreUpdate
     *
     * @throws \Exception
     */
    public function updateDate(): void
    {
        $this->setUpdated(new \DateTime());
    }

    /**
     * @return int
     */
    public function getDtCreated(): int
    {
        return $this->getCreated()->getTimestamp();
    }

    /**
     * @return int
     *
     * @throws \Exception
     */
    public function getDtUpdated(): int
    {
        return $this->getUpdated()->getTimestamp();
    }
}
