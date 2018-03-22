<?php
require_once dirname(__DIR__) . '/vendor/autoload.php';
$dotenv = new \Dotenv\Dotenv(dirname(__DIR__));
$dotenv->load();

if (env('APP_ENV') === 'local') {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}
session_start();