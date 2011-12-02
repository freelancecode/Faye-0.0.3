<?php

define('DS', DIRECTORY_SEPARATOR);

require_once 'entity.walkrecursive.php';

Entity\WalkRecursive::$type = '.php';

Entity\WalkRecursive::crawl('/var/www/testlab/Faye-0.0.3/');

print_r( Entity\WalkRecursive::$included );
