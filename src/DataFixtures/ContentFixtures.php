<?php


namespace App\DataFixtures;


use App\Entity\Content;
use App\Entity\Faculty;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ContentFixtures extends Fixture
{
    const CONTENT = [
        [
            'slug' => 'rekv_lntu',
            'title' => 'Оплата навчання',
            'text' =>
                'Луцький НТУ'.PHP_EOL.
                'ЄДРПОУ'.PHP_EOL.
                '05477296'.PHP_EOL.
                'Р/р UA858201720313271002201017820'.PHP_EOL.
                'Банк ДКСУ м. Київ'.PHP_EOL.
                PHP_EOL.
                '<b>Обов`язково вказати :</b>'.PHP_EOL.
                'Прізвище, ім`я,'.PHP_EOL.
                'По батькові студента повністю'.PHP_EOL.
                'Курс, семестр'.PHP_EOL.
                'Факультет'.PHP_EOL.
                'Спеціальність'
            ,
            'type' => 2,
            'image' => 'https://dev.root7.ru/rekv_lntu.jpg',
            'link' => 'http://lutsk-ntu.com.ua/uk/rekviziti-dlya-oplati-za-navchannya',
            'files' => null
        ], [
            'slug' => 'rekv_gurtojitok',
            'title' => 'Оплата гуртожитку',
            'text' => 'Нові реквізити для оплати за навчання та проживання у гуртожитку',
            'type' => 2,
            'image' => 'https://dev.root7.ru/rekv_lntu.jpg',
            'link' => 'http://lutsk-ntu.com.ua/uk/novi-rekviziti-dlya-oplati-za-navchannya-ta-prozhivannya-u-gurtozhitku',
            'files' => null
        ], [
            'slug' => 'schedule_lessons',
            'title' => 'Розклад дзвінків',
            'text' => null,
            'type' => 2,
            'image' => 'https://dev.root7.ru/rekv_lntu.jpg',
            'link' => null,
            'files' => null
        ], [
            'slug' => 'teachers_list',
            'title' => 'Список викладачів',
            'text' => null,
            'type' => 2,
            'image' => null,
            'link' => 'https://dev.root7.ru/kniga_lntu.pdf',
            'files' => null
        ], [
            'slug' => 'weeks',
            'title' => 'Список тижднів',
            'text' => null,
            'type' => 2,
            'image' => 'https://dev.root7.ru/weeks.jpg',
            'link' => null,
            'files' => null
        ], [
            'slug' => 'map',
            'title' => 'Карта ЛНТУ',
            'text' => null,
            'type' => 2,
            'image' => 'https://dev.root7.ru/map1.png',
            'link' => null,
            'files' => null
        ],
        // Abuturient
        [
            'slug' => 'dlya_vipusknikiv_shkil',
            'title' => 'Для випускників шкіл',
            'text' => null,
            'type' => 2,
            'image' => null,
            'link' => 'http://lutsk-ntu.com.ua/sites/default/files/sites/default/files/files12/dlya_vipusknikiv_shkil_2020.pdf',
            'files' => null
        ], [
            'slug' => 'dlya_vipusknikiv_koledzhiv',
            'title' => 'Для випускників коледжів',
            'text' => null,
            'type' => 3,
            'image' => null,
            'link' => 'http://lutsk-ntu.com.ua/sites/default/files/sites/default/files/files12/dlya_vipusknikiv_koledzhiv_2020_.pdf',
            'files' => null
        ], [
            'slug' => 'pravila_priyomu',
            'title' => 'Правило прийому',
            'text' => null,
            'type' => 3,
            'image' => null,
            'link' => 'http://lutsk-ntu.com.ua/uk/pravila-priyomu-2020',
            'files' => null
        ], [
            'slug' => 'vartist_navchannya',
            'title' => 'Вартість навчання',
            'text' => null,
            'type' => 3,
            'image' => null,
            'link' => 'http://lutsk-ntu.com.ua/sites/default/files/sites/default/files/files13/cinap.pdf',
            'files' => null
        ], [
            'slug' => 'dlya_vipusknikiv_koledzhiv',
            'title' => 'Приймальна комісія',
            'text' =>
                'Адреса: 43018, Україна, м. Луцьк, вул. Львівська 75'.PHP_EOL.
                'Тел.:  +38(0332)746111'.PHP_EOL.
                'E-mail: pk@lntu.edu.ua'.PHP_EOL.
                'Website: lutsk-ntu.com.ua'.PHP_EOL.
                'Facebook: LutskNationalTechnicalUniversity',
            'type' => 3,
            'image' => null,
            'link' => 'http://lutsk-ntu.com.ua/uk/kontaktni-dani-priymalnoyi-komisiyi',
            'files' => null
        ]
    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::CONTENT as $contentData) {
            $content = new Content();
            $content->setSlug($contentData['slug']);
            $content->setTitle($contentData['title']);
            $content->setText($contentData['text']);
            $content->setType($contentData['type']);
            $content->setImage($contentData['image']);
            $content->setLink($contentData['link']);
            $content->setFiles($contentData['files']);
            $manager->persist($content);
        }
        $manager->flush();
    }
}