<?php

declare(strict_types=1);

use App\TemplateRenderer;
use App\Device\DeviceMapper;
use App\Device\DeviceController;

$config = require __DIR__ . '/settings.php';

$pdo = new \PDO(
    $config['database']['dsn'],
    $config['database']['username'],
    $config['database']['password'],
    $config['database']['options']
);
$name = $pdo->getAttribute(PDO::ATTR_DRIVER_NAME);
if ($name === 'sqlite') {
    $pdo->exec('PRAGMA foreign_keys = ON');
}

$template = new TemplateRenderer();

$deviceMapper = new DeviceMapper($pdo);

$deviceController = new DeviceController($deviceMapper, $template);
