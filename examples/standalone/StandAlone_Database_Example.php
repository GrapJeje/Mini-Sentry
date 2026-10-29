<?php

use JasonVanLoon\MiniSentry\Database\Database;

// Configure all the settings, most of the time out of the .env
$config = [
    'driver' => $_ENV['DB_CONNECTION'] ?? 'sqlite',
    'database' => $_ENV['DB_DATABASE'] ?? __DIR__ . '/database.sqlite',
    'host' => $_ENV['DB_HOST'] ?? '127.0.0.1',
    'username' => $_ENV['DB_USERNAME'] ?? null,
    'password' => $_ENV['DB_PASSWORD'] ?? null,
];

// Create the new database connector
$database = new Database($config);
