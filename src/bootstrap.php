<?php
require_once dirname(__DIR__) . '/vendor/autoload.php';
//$dotenv = new \Dotenv\Dotenv(dirname(__DIR__));
//$dotenv->load();
require_once dirname(__DIR__) . '/env.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();