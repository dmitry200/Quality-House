<?php
	require_once "engine/ctemplater.php";
	require_once "engine/ctools.php";
	require_once "engine/cform.php";
	require_once "engine/settings.php";
  require_once "qh/classes/areas.class.php";
  require_once "qh/classes/rcs.class.php";
  
  use QH\Classes\RCS;
  use QH\Classes\Areas;
  
  $CT = new CTemplater("templates/tpl", "templates/tpl_c", "templates/configs", "templates/cache");
	
	$DB = new PDO("mysql:dbname=".DATA_BASE_NAME.";host=127.0.0.1", USER_NAME, USER_PASSWORD);
	$DB->exec("SET NAMES utf8");
  
  $RCS = new RCS($DB);  
  $AM = new Areas($DB);
    
?>
