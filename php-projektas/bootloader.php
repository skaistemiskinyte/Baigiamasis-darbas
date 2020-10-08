<?php
session_start();
define('ROOT', __DIR__);
define('DB_FILE', ROOT . '\app\data\db.json');


require 'vendor/autoload.php';

require 'app/config/routes.php';
//require 'app/functions/form/validators.php';
require 'core/functions/html.php';
require 'core/functions/form/validators.php';

$app = new App\App();
