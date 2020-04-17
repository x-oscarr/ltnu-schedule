<?php

namespace App\DataFixtures;

use App\Entity\Semester;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class SemesterFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $semester = new Semester();
        $semester->setName('2020/2');
        $semester->setStartDate(new \DateTime('2020-03-03'));
        $semester->setEndDate(new \DateTime('2020-05-28'));
        $manager->persist($semester);
        $manager->flush();
    }

    public function getOrder()
    {
        return 3; // the order in which fixtures will be loaded
    }
}
