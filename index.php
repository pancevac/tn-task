<?php

use App\Application;
use App\Classes\LogDriver;
use App\LogManager;

require __DIR__ . '/vendor/autoload.php';

$logger = LogManager::getInstance();
$logger->setDriver(new LogDriver());

$app = new Application();
$app->boot();