<?php

namespace Helpers;

/**
 * Class CombineSyllabus
 * Combine syllabus files
 * @package Helpers
 */
class CombineSyllabus
{
    /**
     * output base name
     */
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
                    // write this syllabus file to the output file
                    fwrite($syllabusFile, file_get_contents("{$directory}/{$prefix}/{$f}") . PHP_EOL);
                    // Add separator between each block
                    fwrite($syllabusFile, self::divider());
                }
            }
        }

        fclose($syllabusFile);
        print "Syllabus files written to \"{$directory}/". self::FILE_NAME . self::EXTENSION . "\"!" . PHP_EOL;

    }

    /**
     * markdown style hr tag
     * @return string
     */
    private static function divider()
    {
      return PHP_EOL . "- - -\n\n";
    }
}
