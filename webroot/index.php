<?php
define('DS',DIRECTORY_SEPARATOR);
define('ROOT',dirname(dirname(__FILE__)));
define('VIEW',ROOT.DS.'views');

require_once(ROOT.DS.'lib'.DS.'init.php');

//echo 'test';
session_start();

App::run($_SERVER['REQUEST_URI']);

session_destroy();




