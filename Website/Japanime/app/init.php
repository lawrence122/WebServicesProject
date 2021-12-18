<?php
session_start();
require "autoload.php";
require "core/helpers.php";

$path = getcwd();
$path = preg_replace('/^.+\\\\htdocs\\\\/', '/', $path);
$path = str_replace('\\', '/', $path);
define("BASE", $path);

?>