<?php

define('PATH', dirname(__FILE__, 1));
define('URL', 'http://' . $_SERVER['HTTP_HOST']);

// DataBase param
define('DBHOST', '127.0.0.1');
define('DBPORT', 3306);
define('DBUSER', 'root');
define('DBPASS', '');
define('DBNAME', 'aonews');


require_once(PATH .'/vendor/autoload.php');
