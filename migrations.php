<?php

//define constant
use core\Application;
use core\Config;
use Symfony\Component\Dotenv\Dotenv;

const PROOT = __DIR__;
const DS = DIRECTORY_SEPARATOR;


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

$config = [
    'db' => [
        'drivers' => Config::get('DB_DRIVERS') ?? 'mysql',
        'host' => Config::get('DB_HOST'),
        'port' => Config::get('DB_PORT'),
        'database' => Config::get('DB_DATABASE'),
        'username' => Config::get('DB_USERNAME'),
        'password' => Config::get('DB_PASSWORD'),
        'activate' => Config::get('DB_ACTIVATE'),
    ]
];

// Initialize the Application
try {
    $app = new Application(__DIR__, $config);
} catch (Exception $e) {
    echo $e;
}

$app->db->applyMigrations();