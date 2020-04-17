<?php

namespace App\DataFixtures;

use App\Entity\Day;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class DayFixtures extends Fixture implements OrderedFixtureInterface
{
    private const DAYS = [
        [
            'number' => 1,
            'name' => 'Вівторок'
        ],
        [
            'number' => 2,
            'name' => 'Середа'
        ],
        [
            'number' => 3,
            'name' => 'Четвер'
        ],
        [
            'number' => 4,
            'name' => "П'ятниця"
        ],
        [
            'number' => 5,
            'name' => 'Субота'
        ],
    ];
    public function load(ObjectManager $manager)
    {
        foreach (self::DAYS as $oneDay) {
            $day = new Day();
            $day->setName($oneDay['name']);
            $day->setNumber($oneDay['number']);
            $manager->persist($day);
        }
        $manager->flush();
    }

    public function getOrder()
    {
        return 2; // the order in which fixtures will be loaded
    }
}
