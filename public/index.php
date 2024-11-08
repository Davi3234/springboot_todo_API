<?php

require_once __DIR__ . '/../vendor/autoload.php';

$controllers = require __DIR__ . '/../app/Config/routes.php';
$server = new \Core\Server($controllers);
$server->dispatch();
