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
        ////////////
        // FKNIT
        ////////////
        ['faculty' => 'ФКНІТ', 'groups' => [
            [
                'name' => "ІПЗм",
                'course' => 1,
                'number' => 1,
            ],
            [
                'name' => "ПНКм",
                'course' => 1,
                'number' => 1
            ],
            [
                'name' => "КНм",
                'course' => 1,
                'number' => 1
            ],
            [
                'name' => "КНм",
                'course' => 1,
                'number' => 2
            ],
            [
                'name' => "КСМм",
                'course' => 1,
                'number' => 1
            ],
            [
                'name' => "ПІЗ",
                'course' => 1,
                'number' => 1
            ],
            [
                'name' => "ПІЗс",
                'course' => 1,
                'number' => 1
            ],
            [
                'name' => "ПНК",
                'course' => 1,
                'number' => 1
            ],
            [
                'name' => "ПНКс",
                'course' => 1,
                'number' => 1
            ],
            [
                'name' => "КН",
                'course' => 1,
                'number' => 1
            ],
            [
                'name' => "КНс",
                'course' => 1,
                'number' => 1
            ],
            [
                'name' => "КСМ",
                'course' => 1,
                'number' => 1
            ],
            [
                'name' => "КСМі",
                'course' => 1,
                'number' => 2
            ],
            [
                'name' => "КСМс",
                'course' => 1,
                'number' => 1
            ],
            [
                'name' => "КБ",
                'course' => 1,
                'number' => 1
            ],
            [
                'name' => "КБс",
                'course' => 1,
                'number' => 1
            ],
            [
                'name' => "ПІЗ",
                'course' => 2,
                'number' => 1
            ],
            [
                'name' => "КН",
                'course' => 2,
                'number' => 1
            ],
            [
                'name' => "КСМ",
                'course' => 2,
                'number' => 1
            ],
            [
                'name' => "КСМі",
                'course' => 2,
                'number' => 1
            ],
            [
                'name' => "КБ",
                'course' => 2,
                'number' => 1
            ],
            [
                'name' => "ПІЗ",
                'course' => 3,
                'number' => 1
            ],
            [
                'name' => "ПНК",
                'course' => 3,
                'number' => 1
            ],
            [
                'name' => "КН",
                'course' => 3,
                'number' => 1
            ],
            [
                'name' => "КСМ",
                'course' => 3,
                'number' => 1
            ],
            [
                'name' => "КСМі",
                'course' => 3,
                'number' => 2
            ],
            [
                'name' => "КБ",
                'course' => 3,
                'number' => 1
            ],
            [
                'name' => "ПІЗ",
                'course' => 4,
                'number' => 1
            ],
            [
                'name' => "ПІЗс",
                'course' => 2,
                'number' => 1
            ],
            [
                'name' => "ПНК",
                'course' => 4,
                'number' => 1
            ],
            [
                'name' => "ПНКс",
                'course' => 2,
                'number' => 1
            ],
            [
                'name' => "КН",
                'course' => 4,
                'number' => 1
            ],
            [
                'name' => "КНс",
                'course' => 2,
                'number' => 1
            ],
            [
                'name' => "КСМ",
                'course' => 4,
                'number' => 1
            ],
            [
                'name' => "КСМ",
                'course' => 4,
                'number' => 2
            ],
            [
                'name' => "КСМі",
                'course' => 4,
                'number' => 3
            ],
            [
                'name' => "КСМс",
                'course' => 2,
                'number' => 1
            ]
        ]],
        ////////////
        // MBF
        ////////////
        ['faculty' => 'МБФ', 'groups' => [
            [
                'name' => "ТТ",
                'course' => 4,
                'number' => 1
            ],
            [
                'name' => "ТТс",
                'course' => 2,
                'number' => 1
            ],
            [
                'name' => "АІм",
                'course' => 1,
                'number' => 1
            ],
            [
                'name' => "Мм(ПІВ)",
                'course' => 1,
                'number' => 1
            ],
            [
                'name' => "Мм(ОСВ)",
                'course' => 1,
                'number' => 2
            ],
            [
                'name' => "Мм(ОЛП)",
                'course' => 1,
                'number' => 3
            ],
            [
                'name' => "Мм(ОЛК)",
                'course' => 1,
                'number' => 4
            ],
            [
                'name' => "АТм",
                'course' => 1,
                'number' => 1
            ],
            [
                'name' => "ТТм",
                'course' => 1,
                'number' => 1
            ],
            [
                'name' => "М",
                'course' => 1,
                'number' => 1
            ],
            [
                'name' => "Мс(ІПВ)",
                'course' => 1,
                'number' => 1
            ],
            [
                'name' => "Мс(ОСВ)",
                'course' => 1,
                'number' => 2
            ],
            [
                'name' => "Мс(ОЛП)",
                'course' => 1,
                'number' => 3
            ],
            [
                'name' => "Мс(ОЛК)",
                'course' => 1,
                'number' => 4
            ],
            [
                'name' => "АТ",
                'course' => 1,
                'number' => 1
            ],
            [
                'name' => "АТс",
                'course' => 1,
                'number' => 1
            ],
            [
                'name' => "ТТ",
                'course' => 1,
                'number' => 1
            ],
            [
                'name' => "ТТс",
                'course' => 1,
                'number' => 1
            ],
            [
                'name' => "ХТ",
                'course' => 1,
                'number' => 1
            ],
            [
                'name' => "ХТс",
                'course' => 1,
                'number' => 1
            ],
            [
                'name' => "ЛП",
                'course' => 1,
                'number' => 1
            ],
            [
                'name' => "ЛГ",
                'course' => 1,
                'number' => 1
            ],
            [
                'name' => "АТ",
                'course' => 1,
                'number' => 1
            ],
            [
                'name' => "М",
                'course' => 2,
                'number' => 1
            ],
            [
                'name' => "АТ",
                'course' => 2,
                'number' => 1
            ],
            [
                'name' => "ТТ",
                'course' => 2,
                'number' => 1
            ],
            [
                'name' => "ХТ",
                'course' => 2,
                'number' => 1
            ],
            [
                'name' => "ЛП",
                'course' => 2,
                'number' => 1
            ],
            [
                'name' => "ЛГ",
                'course' => 2,
                'number' => 1
            ],
            [
                'name' => "ЛГс",
                'course' => 1,
                'number' => 1
            ],
            [
                'name' => "АІ",
                'course' => 2,
                'number' => 1
            ],
            [
                'name' => "АІс",
                'course' => 1,
                'number' => 1
            ],
            [
                'name' => "ЛГ",
                'course' => 3,
                'number' => 1
            ],
            [
                'name' => "М(ПІВ)",
                'course' => 3,
                'number' => 1
            ],
            [
                'name' => "М(ОСВ)",
                'course' => 3,
                'number' => 2
            ],
            [
                'name' => "М(ОЛП)",
                'course' => 3,
                'number' => 3
            ],
            [
                'name' => "М(ОЛК)",
                'course' => 3,
                'number' => 4
            ],
            [
                'name' => "АТ",
                'course' => 3,
                'number' => 1
            ],
            [
                'name' => "ТТ",
                'course' => 3,
                'number' => 1
            ],
            [
                'name' => "АІ",
                'course' => 3,
                'number' => 1
            ],
            [
                'name' => "ХТ",
                'course' => 3,
                'number' => 1
            ],
            [
                'name' => "ЛП",
                'course' => 3,
                'number' => 1
            ],
            [
                'name' => "ЛПс",
                'course' => 1,
                'number' => 1
            ],
            [
                'name' => "М(ОПВ)",
                'course' => 4,
                'number' => 1
            ],
            [
                'name' => "М(ОСВ)",
                'course' => 4,
                'number' => 2
            ],
            [
                'name' => "М(ОЛП)",
                'course' => 4,
                'number' => 3
            ],
            [
                'name' => "М(ОЛК)",
                'course' => 4,
                'number' => 3
            ],
            [
                'name' => "Мс(ОСВ)",
                'course' => 2,
                'number' => 1
            ],
            [
                'name' => "Мс(ОЛП)",
                'course' => 2,
                'number' => 2
            ],
            [
                'name' => "Мс(ОЛК)",
                'course' => 2,
                'number' => 3
            ],
            [
                'name' => "АТ",
                'course' => 4,
                'number' => 1
            ],
            [
                'name' => "АТс",
                'course' => 2,
                'number' => 1
            ]
        ]]
    ];

    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        foreach (self::GROUPS as $facultyList) {
            $faculty = $manager->getRepository(Faculty::class)->findOneBy([
                'abbreviation' => $facultyList['faculty']
            ]);
            foreach ($facultyList['groups'] as $oneGroup) {
                $group = new StudentsGroup();
                $group->setName($oneGroup['name']);
                $group->setCourse($oneGroup['course']);
                $group->setNumber($oneGroup['number']);
                $group->setFaculty($faculty);
                $manager->persist($group);
            }
        }
        $manager->flush();
    }

    public function getOrder()
    {
        return 4; // the order in which fixtures will be loaded
    }
}
