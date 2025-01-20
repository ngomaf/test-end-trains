<?php

define("PATH", dirname(__FILE__, 2));
define("URL", "http://" . $_SERVER['HTTP_HOST']);

// From https://mailtrap.io
define("EMAIL_HOST", "sandbox.smtp.mailtrap.io");
define("EMAIL_USERNAME", "e9132dc04ddc07");
define("EMAIL_PASSWORD", "d35d548f35b22b");
define("EMAIL_PORT", 2525);

require "vendor/autoload.php";

session_start();
