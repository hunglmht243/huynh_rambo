<?php
require_once(realpath($_SERVER["DOCUMENT_ROOT"]).'/vendor/autoload.php') ;

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();
define('SERVERNAME',$_ENV['hostname']);
define('USERNAME',$_ENV['username']);
define('PASSWORD',$_ENV['password']);
define('DATABASE',$_ENV['dbname']);
?>