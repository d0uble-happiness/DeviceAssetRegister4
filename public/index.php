<?php

declare(strict_types=1);

define('PROJECT_ROOT', realpath(__DIR__ . '/..') . '/');

require_once __DIR__ . '/../vendor/autoload.php';

require_once __DIR__ . '/../config/dependencies.php';

require __DIR__ . '/../config/routes.php';
