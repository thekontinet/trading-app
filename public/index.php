<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));
const APP_ROOT_PATH = __DIR__ . '/..';
const APP_ENV_PATH = APP_ROOT_PATH;

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = APP_ROOT_PATH .'/storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
require APP_ROOT_PATH .'/vendor/autoload.php';

// Bootstrap Laravel and handle the request...
(require_once APP_ROOT_PATH . '/bootstrap/app.php')
    ->handleRequest(Request::capture());
