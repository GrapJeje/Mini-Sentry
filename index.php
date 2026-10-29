<?php

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Support\Env;

require_once __DIR__ . '/vendor/autoload.php';

// Add a database connection
$capsule = new Capsule;
$capsule->addConnection([
    'driver' => Env::get('DB_CONNECTION', 'sqlite'),
    'host' => Env::get('DB_HOST', '127.0.0.1'),
    'database' => Env::get('DB_DATABASE', 'mini_sentry'),
    'username' => Env::get('DB_USERNAME', 'root'),
    'password' => Env::get('DB_PASSWORD', ''),
]);

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();
