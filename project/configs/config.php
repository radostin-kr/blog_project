<?php
#връзката към базата данни
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '123');
define('DB_DATABASE', 'DB');

#директория на приложението
define('PROJEC_FOLDER', substr(dirname($_SERVER['PHP_SELF']), 1) . '/');

#константи с пътищата им към директориите
define('LIBRARY_PATH', 'libs/');
define('APPLICATION_PATH', 'app/');

define('CONTROLLERS_PATH', APPLICATION_PATH . 'controllers/');
define('MODEL_PATH',   APPLICATION_PATH . 'model/');
define('VIEW_PATH',   APPLICATION_PATH . 'view/');

define('PDO_DUMP_DIE', false);