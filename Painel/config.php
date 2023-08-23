<?php
require 'environment.php';

$config = array();
if(ENVIRONMENT == 'development') {
	define("BASE_URL", "http://localhost/Painel/");
	define("BASE_URL_SITE", "http://localhost/Diamond/");
	define("PATH_SITE", "../Diamond/");
	$config['dbname'] = 'dbcomercial';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'root';
	$config['dbpass'] = '';
} else {
	define("BASE_URL", "http://localhost/Painel/");
	define("BASE_URL_SITE", "http://localhost/Diamond/");
	define("PATH_SITE", "../Diamond/");
	$config['dbname'] = 'dbcomercial';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'root';
	$config['dbpass'] = '';
}

global $db;
try {
	$db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'], $config['dbuser'], $config['dbpass']);
} catch(PDOException $e) {
	echo "ERRO: ".$e->getMessage();
	exit;
}

?>