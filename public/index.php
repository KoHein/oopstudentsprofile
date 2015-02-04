<?php 

/**
 * For Index.php Directory
 * @Author KoHein
 */
define('DD', __DIR__ . '/..');

/**
 *For Autoload Directory
 *@Author KoHein
 */
require DD . '/vendor/autoload.php';

/**
 *For NameSpace Autoload
 * use -> namespace filename
 *@Author KoHein
 */
use student\Core\Application;

/**
 *For Application Start
 *@Author KoHein
 */
$app = new Application();
$app->run();

/**
 *For Application Destory
 *@Author KoHein
 */
unset($app);

 ?>