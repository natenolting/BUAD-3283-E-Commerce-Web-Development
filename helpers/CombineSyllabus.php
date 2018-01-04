#!/usr/bin/env php
<?php
/**
 * Combine syllabus files
 */
require_once dirname(__DIR__) . '/vendor/autoload.php';

/**
 * Class CombineSyllabus
 */
class CombineSyllabus
{

    const FILE_NAME = "syllabus";
    /**
     * syllabus files and directory prefix
     */
    const SYLLABUS_PREFIX = 'course_syllabus';
    /**
     * schedule files and directory prefix
     */
    const SCHEDULE_PREFIX = 'course_schedule';
    /**
     * file extension
     */
    const EXTENSION = '.md';

    /**
     * @param $directory
     */
    public static function generate($directory)
    {
        $syllabusFile = fopen("{$directory}/". self::FILE_NAME . self::EXTENSION, 'w');

        foreach ([self::SYLLABUS_PREFIX, self::SCHEDULE_PREFIX] as $prefix) {

            if (file_exists("{$directory}/{$prefix}") && is_dir("{$directory}/{$prefix}")) {
                $files = scandir("{$directory}/{$prefix}");
                foreach ($files as $f) {
                    if ($f === '.' || $f === '..' || substr($f, (strlen($f)-strlen(self::EXTENSION)), strlen($f)) !== self::EXTENSION) {
                        continue;
                    }
                    fwrite($syllabusFile, file_get_contents("{$directory}/{$prefix}/{$f}") . PHP_EOL);
                }
            }
        }

        fclose($syllabusFile);
        print "Syllabus files written to \"{$directory}/". self::FILE_NAME . self::EXTENSION . "\"!" . PHP_EOL;

    }
}
// and combine the syllabus files
CombineSyllabus::generate(exec('pwd'));
