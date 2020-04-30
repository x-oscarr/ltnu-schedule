<?php

namespace App\DataFixtures;

use App\Entity\Faculty;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class FacultyFixtures extends Fixture implements OrderedFixtureInterface
{
    private const FACULTIES = [
        ['name' => 'Машинобудівний факультет', 'abbreviation' => 'МБФ'],
        ['name' => 'Технологічний факультет', 'abbreviation' => 'ТЕФ'],
        ['name' => 'Факультет бізнесу', 'abbreviation' => 'ФБ'],
        ['name' => 'Факультет архітектури, будівництва та дизайну', 'abbreviation' => 'ФАБД'],
        ['name' => 'Факультет екології, туризму та електроінженерії', 'abbreviation' => 'ФЕТЕ'],
        ['name' => 'Факультет комп’ютерних наук та інформаційних технологій', 'abbreviation' => 'ФКНІТ'],
        ['name' => 'Факультет фінансів, обліку, лінгвістики та права', 'abbreviation' => 'ФФОЛП'],
    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::FACULTIES as $oneFaculty) {
            $faculty = new Faculty();
            $faculty->setName($oneFaculty['name']);
            $faculty->setAbbreviation($oneFaculty['abbreviation']);
            $manager->persist($faculty);
        }
        $manager->flush();
    }

    public function getOrder()
    {
        return 1; // the order in which fixtures will be loaded
    }
}
