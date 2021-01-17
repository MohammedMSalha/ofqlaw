<?php 
/**
* This file contain all general functionality      
* @author Mohammed M.Salha
* @version 1.0
*/



DEFINE("ROOT_PATH", $_SERVER["DOCUMENT_ROOT"] . "/");
define("BASE_URL", $_SERVER['REQUEST_URI']);
//url 
define("LOGIN_ROOT", BASE_URL."login/");
//path
define("LOGIN_PARTS", ROOT_PATH."files/parts/login/");
define("CONTENT", ROOT_PATH."files/page/content/");
define("DB_ROOT", ROOT_PATH."DB/");
define("CLASSES_ROOT", ROOT_PATH."inc/classes/");
define("INC_ROOT", ROOT_PATH."inc/");

define("DASHBOARD_PARTS", ROOT_PATH."files/parts/dashboard/");
define("PARTS", ROOT_PATH."files/parts/");


define( 'SCRIPT_ROOT', "/assets/");
include(ROOT_PATH."connection.php");


Global $connection;
$db = new dbObj();
$connection =  $db->getConnstring();
include(DB_ROOT."query.php");

$tables = new CreateTables();

$tables->users();
$tables->meta();
$tables->clients();


$tables->files();
 
$tables->opponents();


$tables->dues();
 
$tables->payments();
$tables->currency();

$tables->logs();

//Config DataBase
include(CLASSES_ROOT."clients.php");
include(CLASSES_ROOT."file.php");
include(CLASSES_ROOT."opponents.php");
include(CLASSES_ROOT."dues.php");
include(CLASSES_ROOT."fees.php");
include(CLASSES_ROOT."payments.php");
include(CLASSES_ROOT."users.php");


 



?>
 




 