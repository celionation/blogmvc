<?php

//define constant
use core\Application;
use Symfony\Component\Dotenv\Dotenv;

const PROOT = __DIR__;
const DS = DIRECTORY_SEPARATOR;
const TimeZone = 'Africa/Lagos';

require_once(PROOT . DS . 'lib/dotenv/Dotenv.php');
require_once(PROOT . DS . 'lib/dotenv/Exception/ExceptionInterface.php');
require_once(PROOT . DS . 'lib/dotenv/Exception/FormatException.php');
require_once(PROOT . DS . 'lib/dotenv/Exception/FormatExceptionContext.php');
require_once(PROOT . DS . 'lib/dotenv/Exception/PathException.php');

spl_autoload_register(function ($classname){
    $parts = explode('\\', $classname);
    $class = end($parts);
    array_pop($parts);
    $path = strtolower(implode(DS, $parts));
    $path = PROOT . DS . $path . DS . $class . '.php';
    if(file_exists($path)) {
        include($path);
    }
});

//Dotenv Loading
$dotenv = new Dotenv();
$dotenv->load(PROOT . DS . '.env');

// Initialize the Application
$app = new Application();