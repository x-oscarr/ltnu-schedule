<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LessonRepository")
 */
class Lesson
{
    const WEEK_NUMERATOR = Week::WEEK_TYPE_NUMERATOR;
    const WEEK_DENOMINATOR = Week::WEEK_TYPE_DENOMINATOR;
    const WEEK_BOTH = 3;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $subject;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $teacher;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $auditory;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\StudentsGroup", inversedBy="lessons")
     * @ORM\JoinColumn(nullable=false)
     */
    private $studentGroup;

    /**
     * @ORM\Column(type="integer")
     */
    private $type;

    /**
     * @ORM\Column(type="integer")
     */
    private $typeOfWeek;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Semester", inversedBy="lessons")
     * @ORM\JoinColumn(nullable=false)
     */
    private $semester;

    /**
     * @ORM\Column(type="integer")
     */
    private $dayOfWeek;

    /**
     * @ORM\Column(type="integer")
     */
    private $number;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSubject(): ?string
    {
        return $this->subject;
    }

    public function setSubject(string $subject): self
    {
        $this->subject = $subject;

        return $this;
    }

    public function getTeacher(): ?string
    {
        return $this->teacher;
    }

    public function setTeacher(?string $teacher): self
    {
        $this->teacher = $teacher;

        return $this;
    }

    public function getAuditory(): ?string
    {
        return $this->auditory;
    }

    public function setAuditory(?string $auditory): self
    {
        $this->auditory = $auditory;

        return $this;
    }

    public function getStudentGroup(): ?StudentsGroup
    {
        return $this->studentGroup;
    }

    public function setStudentGroup(?StudentsGroup $studentGroup): self
    {
        $this->studentGroup = $studentGroup;

        return $this;
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

    public function getTypeOfWeek(): ?int
    {
        return $this->typeOfWeek;
    }

    public function setTypeOfWeek(int $typeOfWeek): self
    {
        $this->typeOfWeek = $typeOfWeek;

        return $this;
    }

    public function getSemester(): ?Semester
    {
        return $this->semester;
    }

    public function setSemester(?Semester $semester): self
    {
        $this->semester = $semester;

        return $this;
    }

    public function getDayOfWeek(): ?int
    {
        return $this->dayOfWeek;
    }

    public function setDayOfWeek(int $dayOfWeek): self
    {
        $this->dayOfWeek = $dayOfWeek;

        return $this;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(int $number): self
    {
        $this->number = $number;

        return $this;
    }
}
