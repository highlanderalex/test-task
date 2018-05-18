<?php
    define("URL", 'http://www.rollshop.co.il/test.php');
    //define("URL", 'http://test-form.loc/');
    define("COUNT_THREADS", 7);
    define("TIMEOUT", 1800);
    define("TIMEOUT_MSG", 'Превышен интервал выполнения скрипта');
    define("STR_SEARCH", 'wikipedia');

    define("DEBUG", 0);
	define("ROOT", dirname(__DIR__));
	define("WWW", ROOT . '/public');
	define("APP", ROOT . '/app');
	define("CORE", ROOT . '/app/luxury/core');
	define("LIBS", ROOT . '/app/luxury/core/libs');
	define("CACHE", ROOT . '/tmp/cache');
	define("CONF", ROOT . '/config');
	define("LAYOUT", 'default');
	
	$app_path = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}";
	$app_path = preg_replace("#[^/]+$#", "", $app_path);
	$app_path = str_replace("/public/", "", $app_path);
	
	define("PATH", $app_path);
	
	set_time_limit(0);
    ini_set('MAX_EXECUTION_TIME', 15);
	require_once ROOT . '/vendor/autoload.php';