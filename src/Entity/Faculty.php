<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FacultyRepository")
 */
class Faculty
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\StudentsGroup", mappedBy="faculty")
     */
    private $studentGroups;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $abbreviation;

    public function __construct()
    {
        $this->studentGroups = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|StudentsGroup[]
     */
    public function getStudentGroups(): Collection
    {
        return $this->studentGroups;
    }

    public function addStudentGroup(StudentsGroup $studentGroup): self
    {
        if (!$this->studentGroups->contains($studentGroup)) {
            $this->studentGroups[] = $studentGroup;
            $studentGroup->setFaculty($this);
        }

        return $this;
    }

    public function removeStudentGroup(StudentsGroup $studentGroup): self
    {
        if ($this->studentGroups->contains($studentGroup)) {
            $this->studentGroups->removeElement($studentGroup);
            // set the owning side to null (unless already changed)
            if ($studentGroup->getFaculty() === $this) {
                $studentGroup->setFaculty(null);
            }
        }

        return $this;
    }

    public function getAbbreviation(): ?string
    {
        return $this->abbreviation;
    }

    public function setAbbreviation(string $abbreviation): self
    {
        $this->abbreviation = $abbreviation;

        return $this;
    }
}
