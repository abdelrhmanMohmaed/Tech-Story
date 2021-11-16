<?php

// path  &&  url 

define("PATH", __DIR__ . "/");
define("URL", "http://localhost/TeachStory/");

define("APATH", __DIR__ . "/admin/");
define("AURL", "http://localhost/TeachStory/admin/");

define("DB_SERVERNAME", "localhost");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "techstore");

//classes
require_once(PATH . "vendor/autoload.php");

//object
use TechStory\Classes\Request;
use TechStory\Classes\Session;

$request = new Request;
$session = new Session;
