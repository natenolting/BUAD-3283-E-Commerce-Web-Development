<?php

namespace Helpers\Generate;

/**
 * Class CombineSyllabus
 * Combine syllabus files
 * @package Helpers
 */
/**
 * Class CombineSyllabus
 * @package Helpers\Generate
 */
class GenerateSyllabus implements GenerateFilesInterface
{
    /**
     * output base name
     */
    protected $fileName = "syllabus";
    /**
     * syllabus files and directory prefix
     */
    protected $syllabusPrefix = 'course_syllabus';
    /**
     * schedule files and directory prefix
     */
    protected $schedulePrefix = 'course_schedule';

    /**
     * notes files and directory prefix
     */
    protected $notesPrefix = 'course_notes';
    /**
     * @param string $extension file extension
     */
    protected $extension = '.md';
    /**
     * @var
     */
    protected $directory;

    /**
     * CombineSyllabus constructor.
     * @param array $args
     */
    public function __construct(array $args = []) {

        $this->init($args);
        return $this;
    }

    /**
     * @param array $args
     */
    public function init(array $args = [])
    {
        foreach ($args as $key => $val) {
            if(property_exists($this, $key)) {
                $this->{'set'.ucfirst($key)}($val);
            }
        }
    }

    /**
     * Generate the combined syllabus file
     */
    public function generate()
    {
        $syllabusFile = fopen( $this->getDirectory() ."/". $this->getFileName() . $this->getExtension(), 'w');

        foreach ([$this->getSyllabusPrefix(), $this->getSchedulePrefix()] as $prefix) {

            if (file_exists($this->getDirectory() ."/{$prefix}") && is_dir($this->getDirectory(). "/{$prefix}")) {
                $files = scandir($this->getDirectory(). "/{$prefix}");
                foreach ($files as $f) {
                    if ($f === '.' || $f === '..' || substr($f, (strlen($f)-strlen($this->getExtension())), strlen($f)) !== $this->getExtension()) {
                        continue;
                    }
                    // write this syllabus file to the output file
                    fwrite($syllabusFile, file_get_contents($this->getDirectory(). "/{$prefix}/{$f}") . PHP_EOL);
                    // Add separator between each block
                    fwrite($syllabusFile, $this->divider());
                }
            }
        }

        fclose($syllabusFile);
        print "Syllabus files written to \"/". $this->getDirectory() . '/' . $this->getFileName() . $this->getExtension() . "\"!" . PHP_EOL;

    }

    /**
     * @return mixed
     */
    public function getDirectory()
    {
        return $this->directory;
    }

    /**
     * @param mixed $directory
     */
    public function setDirectory($directory)
    {
        $this->directory = $directory;
    }

    /**
     * @return mixed
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * @param mixed $fileName
     */
    public function setFileName($fileName)
    {
        $this->fileName = $fileName;
    }

    /**
     * @return mixed
     */
    public function getExtension()
    {
        return $this->extension;
    }

    /**
     * @param mixed $extension
     */
    public function setExtension($extension)
    {
        $this->extension = $extension;
    }

    /**
     * @return mixed
     */
    public function getSyllabusPrefix()
    {
        return $this->syllabusPrefix;
    }

    /**
     * @param mixed $syllabusPrefix
     */
    public function setSyllabusPrefix($syllabusPrefix)
    {
        $this->syllabusPrefix = $syllabusPrefix;
    }

    /**
     * @return mixed
     */
    public function getSchedulePrefix()
    {
        return $this->schedulePrefix;
    }

    /**
     * @param mixed $schedulePrefix
     */
    public function setSchedulePrefix($schedulePrefix)
    {
        $this->schedulePrefix = $schedulePrefix;
    }

    public function getNotesPrefix()
    {
      return $this->notesPrefix;
    }

    public function setNotesPrefix($value = null)
    {
      $this->notesPrefix = $value;
      return $this;
    }

    /**
     * markdown style hr tag
     * @return string
     */
    private function divider()
    {
      return PHP_EOL . "- - -\n\n";
    }
}
