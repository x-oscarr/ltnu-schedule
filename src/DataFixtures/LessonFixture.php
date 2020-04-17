<?php

namespace App\DataFixtures;

use App\Entity\Day;
use App\Entity\Lesson;
use App\Entity\Semester;
use App\Entity\StudentsGroup;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LessonFixture extends Fixture implements OrderedFixtureInterface
{
    private const LESSONS = [
        [
            'subject' => 'Програмування',
            'teacher' => 'ПЕХ',
            'auditory' => '123',
            'type' => '1',
            'dayOfWeek' => 1,
            'typeOfWeek' => '1',
            'semester' => 1
        ]
    ];
    public function load(ObjectManager $manager)
    {
        foreach (self::LESSONS as $LESSON) {
            $lesson = new Lesson();
            $lesson->setSubject($LESSON['subject']);
            $lesson->setTeacher($LESSON['teacher']);
            $lesson->setAuditory($LESSON['auditory']);
            $lesson->setTypeOfWeek($LESSON['typeOfWeek']);
            $lesson->setType($LESSON['type']);
            $dayOfWeek = $manager->getRepository(Day::class)->findOneBy([]);
            $lesson->setDayOfWeek($dayOfWeek);
            $semester = $manager->getRepository(Semester::class)->findOneBy([]);
            $lesson->setSemester($semester);
            $studentGroup = $manager->getRepository(StudentsGroup::class)->findOneBy([]);
            $lesson->setStudentGroup($studentGroup);
            $manager->persist($lesson);
        }
        $manager->flush();
    }

    public function getOrder()
    {
        return 5; // the order in which fixtures will be loaded
    }
}
