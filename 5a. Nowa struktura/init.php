<?php
require_once 'config.php';
require_once 'lib/smarty/Smarty.class.php';
require_once 'lib/functions.php';

session_start();

$smarty = new Smarty();
$smarty->setTemplateDir('views/templates');
$smarty->setCompileDir('views/templates_c');
$smarty->setCacheDir('views/cache');
$smarty->setConfigDir('views/configs');

$GLOBALS['smarty'] = $smarty;
