<?php
namespace App\Helper;

class ScheduleHelper
{
    const ScheduleArray = [
        [
            'name' => 'Вівторок',
            'day' => '1',
            'uniqid' => '',
            'lessons' => []
        ],
        [
            'name' => 'Середа',
            'day' => '2',
            'uniqid' => '',
            'lessons' => []
        ],
        [
            'name' => 'Четвер',
            'day' => '3',
            'uniqid' => '',
            'lessons' => []
        ],
        [
            'name' => "П'ятниця",
            'day' => '4',
            'uniqid' => '',
            'lessons' => []
        ],
        [
            'name' => 'Субота',
            'day' => '5',
            'uniqid' => '',
            'lessons' => []
        ],
    ];

    public function generateScheduleArray($lessonsArray)
    {
        $schedule = [];
        foreach (self::ScheduleArray as $scheduleItem) {
            $scheduleItem['uniqid'] = random_int(1,9999);
            foreach ($lessonsArray as $lessonItem) {
                if($scheduleItem['day'] == $lessonItem->getDayOfWeek()) {
                    $lesson = [
                        'teacher' => $lessonItem->getTeacher(),
                        'subject' => $lessonItem->getSubject(),
                        'type' => $lessonItem->getType(),
                        'auditory' => $lessonItem->getAuditory(),
                        'number' => $lessonItem->getNumber(),
                        'typeOfWeek' => $lessonItem->getTypeOfWeek(),
                    ];
                    array_push($scheduleItem['lessons'], $lesson);
                }
            }
            array_push($schedule, $scheduleItem);
        }
        return $schedule;
    }
}
