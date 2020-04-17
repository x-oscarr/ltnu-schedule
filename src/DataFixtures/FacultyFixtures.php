<?php

namespace App\DataFixtures;

use App\Entity\Faculty;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class FacultyFixtures extends Fixture implements OrderedFixtureInterface
{
    private const FACULTIES = [
        'Машинобудівний',
        'КНІТ',
        'Факультет бізнесу',
    ];

    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        foreach (self::FACULTIES as $facultyName) {
            $faculty = new Faculty();
            $faculty->setName($facultyName);
            $manager->persist($faculty);
        }

        $manager->flush();
    }

    public function getOrder()
    {
        return 1; // the order in which fixtures will be loaded
    }
}
