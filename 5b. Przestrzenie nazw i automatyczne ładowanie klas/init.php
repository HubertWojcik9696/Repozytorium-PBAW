<?php

require_once __DIR__ . '/lib/ClassLoader.php';
require_once __DIR__ . '/config.php';

use lib\smarty\Smarty;

session_start();


$smarty = new Smarty();
$smarty->setTemplateDir(__DIR__ . '/views/templates');
$smarty->setCompileDir(__DIR__ . '/views/templates_c');
$smarty->setCacheDir(__DIR__ . '/views/cache');
$smarty->setConfigDir(__DIR__ . '/views/configs');


$GLOBALS['smarty'] = $smarty;


