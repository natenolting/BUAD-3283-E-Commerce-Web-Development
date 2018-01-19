<?php

namespace Helpers\Generate;

use Carbon\Carbon;
use Mustache_Engine;

/**
 * Create course schedule files from a stub.
 * Run from the root of project
 *
 * Usage
 * ---------
 * <?php
 * require_once "vendor/autoload.php";
 * $schedule = new Helpers\GenerateFiles(['[start]','[end]','[days]','[directory]']);
 * $schedule->generate();
 *
 * Variables
 * ---------
 * start: A datetime formatted string of when to start, default is now
 * end: A datetime formatted string of when to end, default is now + 6 months
 * days: A comma separated list of days (sunday is 0, saturday is 6), default is 1,3,5
 * directory: directory where class was called
 *
 * Example
 * ---------
 * Start dates on January 9th, 2018, end on April 24th and make schedules for tuesdays and thursdays
 * <?php
 * require_once "vendor/autoload.php";
 * $schedule = new Helpers\GenerateFiles(['2018-01-09', '2018-04-24', '2,4', exec('pwd')])
 * $schedule->generate();
 */
class GenerateCourseFiles implements GenerateFilesInterface
{
    /**
     * @var string $description Default
     */
    protected $description = 'TBA';
    /**
     * @var string $stubPath Path to the template stub file
     */
    protected $stubPath;

    /**
     * @var string $fileExtension File extension to use for output files
     */
    protected $fileExtension = '.md';

    /**
     * @var string $prefix prefix to use for files names and directory
     */
    protected $prefix = 'files';
    /**
     * @var array $defaultDays Default days of the week to use if none were passed
     */
    protected $defaultDays = [1, 3, 5];
    /**
     * @var Carbon $start Start time
     */
    protected $start;
    /**
     * @var Carbon $end end time
     */
    protected $end;
    /**
     * @var array $days Days of the week to use
     */
    protected $days;
    /**
     * @var array $list List of days and their data
     */
    protected $list = [];
    /**
     * @var string $directory Directory to use for writing files
     */
    protected $directory;
    /**
     * @var string $stub Template to use when generating files
     */
    protected $stub;
    /**
     * @var Mustache_Engine
     */
    protected $m;

    /**
     * @var string $branch Current working branch
     */
    protected $branch;

    /**
     * @var string url to remote
     */
    protected $remote;

    /**
     * GenerateCourseSchedule constructor.
     * @param array $args
     */
    public function __construct(array $args = [])
    {
        $this->init($args);
        return $this;
    }

    /**
     * @param array $args
     */
    public function init(array $args = [])
    {
        $this->m = new Mustache_Engine();
        $this->setDirectory((isset($args[3]) ? $args[3] : dirname(dirname(__DIR__))) . DIRECTORY_SEPARATOR . $this->getPrefix());
        $this->makeDirectory($this->getDirectory());
        $this->setStubPath($this->getDirectory() . "/" . $this->getPrefix() . ".stub");
        $this->setStub(file_exists($this->getStubPath()) ? file_get_contents($this->getStubPath()) : "# {{ date }}\n\n{{ description }}\n");
        $this->setStart(isset($args[0]) ? Carbon::createFromTimestamp(strtotime($args[0])) : Carbon::now());
        $this->setEnd(isset($args[1]) ? Carbon::createFromTimestamp(strtotime($args[1])) : Carbon::now()->addMonths(6));
        $this->setDays(isset($args[2]) ? explode(',', $args[2]) : $this->getDefaultDays());
        $this->setBranch($this->whatBranch());
        $this->setRemote($this->whatRemote());
      

    }

    /**
     * Generate the schedule files
     */
    public function generate()
    {
        $int = 1;

        while ($this->getStart()->lessThanOrEqualTo($this->getEnd())) {
            if (in_array($this->getStart()->dayOfWeek, $this->getDays())) {
                $preInt = (strlen($int) === 1 ? '0' : null);

                $params = [];
                foreach (get_class_vars(__CLASS__) as $key => $val) {
                    if (is_string($this->{'get'.ucfirst($key)}())) {
                        $params[$key] = $this->{'get' . ucfirst($key)}();
                    }
                }
                $params['int'] = $preInt . $int;
                $params['suffix'] = '_'. $preInt . $int . "_" . date('F_d', $this->getStart()->timestamp);
                $params['date'] = date('F jS', $this->getStart()->timestamp);
                $params['label'] = $this->getPrefix() . $params['suffix'];
                $params['file'] = $params['label'] . $this->getFileExtension();
                $params['filePath'] = $this->getDirectory() . DIRECTORY_SEPARATOR . $params['file'];
                $params['description'] = $this->generateDescription($params);
                $this->addToList($int, $params);

                if (!file_exists($this->getList()[$int]['filePath'])) {
                    file_put_contents($this->getList()[$int]['filePath'],
                        $this->m->render($this->getStub(), $this->getList()[$int]));
                    echo $this->getList()[$int]['label'] . ' was created!' . PHP_EOL;
                } else {
                    echo $this->getList()[$int]['label'] . ' already exists' . PHP_EOL;
                }
                $int++;
            }
            $this->start->addDay();
        }
    }

    /**
     * @return string
     */
    public function getPrefix()
    {
        return $this->prefix;
    }

    private function makeDirectory($directory)
    {
        if (!file_exists($directory)) {
            mkdir($directory, 0777, true);
        }
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
     * @return array
     */
    public function getDefaultDays()
    {
        return $this->defaultDays;
    }

    /**
     * @param array $defaultDays
     */
    public function setDefaultDays($defaultDays)
    {
        $this->defaultDays = $defaultDays;
    }

    /**
     * @return Carbon
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * @param Carbon $start
     */
    public function setStart($start)
    {
        $this->start = $start;
    }

    /**
     * @return Carbon
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * @param Carbon $end
     */
    public function setEnd($end)
    {
        $this->end = $end;
    }

    /**
     * @return array
     */
    public function getDays()
    {
        return $this->days;
    }

    /**
     * @param array $days
     */
    public function setDays(array $days)
    {
        $this->days = $days;
    }

    /**
     * @param $int
     * @param mixed
     */
    private function addToList($int, $array)
    {
        $this->list[$int] = $array;
    }

    /**
     * @return string
     */
    public function getFileExtension()
    {
        return $this->fileExtension;
    }

    /**
     * @return array
     */
    public function getList()
    {
        return $this->list;
    }

    /**
     * @param array $list
     */
    public function setList(array $list)
    {
        $this->list = $list;
    }

    /**
     * @return string
     */
    public function getStub()
    {
        return $this->stub;
    }

    /**
     * @param string $stub
     */
    public function setStub($stub)
    {
        $this->stub = $stub;
    }

    /**
     * @return Mustache_Engine
     */
    public function getM()
    {
        return $this->m;
    }

    /**
     * @param Mustache_Engine $m
     */
    public function setM($m)
    {
        $this->m = $m;
    }

    /**
     * @param $path string path to the stub file
     */
    private function setStubPath($path)
    {
        $this->stubPath = $path;

    }

    /**
     * @return string
     */
    public function getStubPath()
    {
        return $this->stubPath;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    private function generateDescription($params)
    {
        return $this->m->render($this->getDescription(), $params);
    }

    /**
     * @return string
     */
    public function getBranch()
    {
        return $this->branch;
    }

    /**
     * @param string $branch
     */
    public function setBranch($branch)
    {
        $this->branch = $branch;
    }

    private function whatBranch()
    {
        return exec('branch=$(git branch | sed -n -e \'s/^\* \(.*\)/\1/p\'); echo $branch');
    }

    /**
     * @return mixed
     */
    public function getRemote()
    {
        return $this->remote;
    }

    /**
     * @param mixed $remote
     */
    public function setRemote($remote)
    {
        $this->remote = $remote;
    }

    private function whatRemote()
    {
        $extension = '.git';
        $remote = exec('git remote get-url --push origin');
        if (substr($remote, strlen($remote)-strlen($extension), strlen($remote)) === $extension) {
           return substr($remote, 0, strlen($remote)-strlen($extension));
        }
        return $remote;

    }

}
