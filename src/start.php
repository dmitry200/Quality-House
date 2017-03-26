<?php
	require_once "engine/ctemplater.php";
	require_once "engine/ctools.php";
	require_once "engine/cform.php";
	require_once "engine/settings.php";
  require_once "qh/classes/areas.class.php";
  require_once "qh/classes/rcs.class.php";
  require_once "qh/classes/houses.class.php";
  require_once "qh/classes/flats.class.php";
  require_once "qh/classes/inf.class.php";
  
  use QH\Classes\RCS;
  use QH\Classes\Areas;
  use QH\Classes\Houses;
  use QH\Classes\Flats;
  use QH\Classes\Infs;
  
  $CT = new CTemplater("templates/tpl", "templates/tpl_c", "templates/configs", "templates/cache");
	
	$DB = new PDO("mysql:dbname=".DATA_BASE_NAME.";host=127.0.0.1", USER_NAME, USER_PASSWORD);
	$DB->exec("SET NAMES utf8");
  
  $RCS = new RCS($DB);  
  $AM = new Areas($DB);
  $HM = new Houses($DB);
  $FM = new Flats($DB);
  $INF = new Infs($DB);
  
	
	
?>
