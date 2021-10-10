<?php

require '../vendor/autoload.php';
$config = require '../config.php';

use App\Core\Application;

$app = new Application($config['database']);
$app->run();