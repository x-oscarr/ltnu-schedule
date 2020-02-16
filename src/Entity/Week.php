<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\WeekRepository")
 */
class Week
{
    const WEEK_TYPE_WEEKENDS = 0;
    const WEEK_TYPE_NUMERATOR = 1;
    const WEEK_TYPE_DENOMINATOR = 2;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $type;

    /**
     * @ORM\Column(type="datetime")
     */
    private $monday;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?int
    {
        return $this->type;
    }

    public function setType(int $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getMonday(): ?\DateTimeInterface
    {
        return $this->monday;
    }

    public function setMonday(\DateTimeInterface $monday): self
    {
        $this->monday = $monday;

        return $this;
    }
}
