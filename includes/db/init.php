<?php
ob_start();
date_default_timezone_set('Asia/Manila');
$webroot = 'D:laragon/www';
define('DS', DIRECTORY_SEPARATOR);
define('SITE_ROOT', $webroot.DS.'VALENCIANOS');
define('INCLUDES_PATH', SITE_ROOT.DS.'includes');
require_once(INCLUDES_PATH.DS. 'helpers'.DS.'Helper.php');
require_once(INCLUDES_PATH.DS. 'db'.DS.'config.php');
