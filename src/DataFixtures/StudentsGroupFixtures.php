<?php

namespace App\DataFixtures;

use App\Entity\Faculty;
use App\Entity\StudentsGroup;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class StudentsGroupFixtures extends Fixture implements OrderedFixtureInterface
{
    private const GROUPS = [
        [
            'name' => "КСМ",
            'course' => 1,
            'number' => 1,
        ],
        [
            'name' => "КСМ",
            'course' => 1,
            'number' => 2
        ],
        [
            'name' => "КСМ",
            'course' => 1,
            'number' => 3
        ],
        [
            'name' => "ФДА",
            'course' => 1,
            'number' => 1
        ],
        [
            'name' => "ФДА",
            'course' => 1,
            'number' => 2
        ],
        [
            'name' => "ФДА",
            'course' => 1,
            'number' => 3
        ]
    ];

    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        foreach (self::GROUPS as $oneGroup) {
            $group = new StudentsGroup();
            $group->setName($oneGroup['name']);
            $group->setCourse($oneGroup['course']);
            $group->setNumber($oneGroup['number']);
            $faculty = $manager->getRepository(Faculty::class)->findOneBy([]);
            $group->setFaculty($faculty);
            $manager->persist($group);
        }

        $manager->flush();
    }

    public function getOrder()
    {
        return 4; // the order in which fixtures will be loaded
    }
}
