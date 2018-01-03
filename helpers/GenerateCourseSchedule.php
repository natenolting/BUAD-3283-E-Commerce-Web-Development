#!/usr/bin/env php
<?php

use Carbon\Carbon;

/**
 * Create course schedule files from a stub.
 * Run from the root of project
 *
 * Usage
 * ---------
 * $ php helpers/GenerateCourseSchedule.php [start] [end] [days]
 *
 * Variables
 * ---------
 * start: A datetime formatted string of when to start, default is now
 * end: A datetime formatted string of when to end, default is now + 6 months
 * days: A comma separated list of days (sunday is 0, saturday is 6), default is 1,3,5
 *
 * Example
 * ---------
 * Start dates on January 9th, 2018, end on April 24th and make schedules for tuesdays and thursdays
 * $ php helpers/GenerateCourseSchedule.php 2018-01-09 2018-04-24 2,4
 */
require_once dirname(__DIR__) . '/vendor/autoload.php';


class GenerateCourseSchedule
{
    /**
     * schedule files and directory prefix
     */
    const SCHEDULE_PREFIX = 'course_schedule';

    /**
     * file extension
     */
    const EXTENSION = '.md';

    public static function generate($args, $directory)
    {
        $int = 1;
        $directory = $directory . DIRECTORY_SEPARATOR . self::SCHEDULE_PREFIX;
        self::makeDirectory($directory);
        $m = new Mustache_Engine();
        $stub = file_get_contents("{$directory}/". self::SCHEDULE_PREFIX .".stub");
        $start = isset($args[1]) ? Carbon::createFromTimestamp(strtotime($args[1])) : Carbon::now();
        $end = isset($args[2]) ? Carbon::createFromTimestamp(strtotime($args[2])) : Carbon::now()->addMonths(6);
        $days = isset($args[3]) ? explode(',', $args[3]) : [1, 3, 5];
        $list = [];

        while ($start->lessThanOrEqualTo($end)) {
            if (in_array($start->dayOfWeek, $days)) {
                $label = self::SCHEDULE_PREFIX . "_" . (strlen($int) === 1 ? '0' : null) . $int . "_" . date('F_d', $start->timestamp);

                $list[$int] = [
                    'label' => $label,
                    'file' => $label . self::EXTENSION,
                    'filePath' => $directory . DIRECTORY_SEPARATOR . $label . self::EXTENSION,
                    'date' => date('F jS', $start->timestamp),
                    'description' => 'TBA',
                ];

                if (!file_exists($list[$int]['filePath'])) {
                    file_put_contents($list[$int]['filePath'], $m->render($stub, $list[$int]));
                    echo $list[$int]['label'] . ' was created!' . PHP_EOL;
                } else {
                    echo $list[$int]['label'] . ' already exists' . PHP_EOL;
                }
                $int++;
            }
            $start->addDay();
        }
    }

    private static function makeDirectory($directory)
    {
        if(!file_exists($directory)) {
            mkdir($directory, 0777, true);
        }

    }
}
$args = isset($_SERVER['argv']) ? $_SERVER['argv'] : [];
$directory = exec('pwd');
GenerateCourseSchedule::generate($args, $directory);

