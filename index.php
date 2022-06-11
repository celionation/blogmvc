<?php

//define constant
use core\Application;
use core\Config;
use src\models\Users;
use Symfony\Component\Dotenv\Dotenv;

const PROOT = __DIR__;
const DS = DIRECTORY_SEPARATOR;
const TimeZone = 'Africa/Lagos';

const ROOT = '/';

require_once __DIR__ . '/config/functions.php';

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

error_reporting(E_ALL);
ini_set('display_errors', Config::get('APP_DEBUG'));

$config = [
    'dsn' => Config::get('MAILER_DSN') ?? '',
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

$app->on(Application::EVENT_BEFORE_REQUEST, function () {
    // echo "Before request from second installation </br>";
});

try {
    $currentUser = Users::getCurrentUser();
} catch (Exception $e) {
    echo $e;
}

$url = $_SERVER['REQUEST_URI'];
if (ROOT != '/') {
    $url = str_replace(ROOT, '', $url);
} else {
    $url = ltrim($url, '/');
}
$url = preg_replace('/(\?.+)/', '', $url);

$currentPage = $url;

//\core\helpers\CoreHelpers::dnd($currentPage);

require __DIR__ . '/routes/web.php';

$app->run();