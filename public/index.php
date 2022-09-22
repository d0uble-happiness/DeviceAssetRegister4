<?php

declare(strict_types=1);

/*
 * Relative paths are always related to the current "working dicrectory", which
 * changes depending on which file/script you requested. Currently, you only have
 * index.php, so it shouldn't be a problem.
 * But as a best pratice, you want to use the __DIR__ magic constant, so relative
 * paths would be relative to the file and will be predictable.
 * This constant just return the directory where the file lives.
 */

// Register the project root folder as a constant, so it's easy
// to reference any path in the project.
// see DeviceController at line 32
define('PROJECT_ROOT', realpath(__DIR__ . '/..') . '/');

require_once __DIR__ . '/../vendor/autoload.php';

require_once __DIR__ . '/../config/dependencies.php';

require __DIR__ . '/../config/routes.php';
