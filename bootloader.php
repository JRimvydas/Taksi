<?php

/**
 * sukuriam konstanta ROOT kurios verte yra direktorija kur failas buvo sukurtas (__DIR__)
 */
define('ROOT', __DIR__);
define('DB_DATA', ROOT . '/app/data/db.json');

// Core Functions
require ROOT . '/core/functions/html.php';
require ROOT . '/core/functions/validators.php';

//Autoload all classes
require ROOT . '/vendor/autoload.php';

$app = new App\App(DB_DATA);
