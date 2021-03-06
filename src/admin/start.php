<?php
  
	require_once $_SERVER['DOCUMENT_ROOT']."/src/engine/ctemplater.php";
	require_once $_SERVER['DOCUMENT_ROOT']."/src/engine/ctools.php";
	require_once $_SERVER['DOCUMENT_ROOT']."/src/engine/cform.php";
	require_once $_SERVER['DOCUMENT_ROOT']."/src/engine/settings.php";
  
  require_once $_SERVER['DOCUMENT_ROOT']."/src/qh/classes/areas.class.php";
  require_once $_SERVER['DOCUMENT_ROOT']."/src/qh/classes/rcs.class.php";
  require_once $_SERVER['DOCUMENT_ROOT']."/src/qh/classes/builders.class.php";
  require_once $_SERVER['DOCUMENT_ROOT']."/src/qh/classes/houses.class.php";
  require_once $_SERVER['DOCUMENT_ROOT']."/src/qh/classes/flats.class.php";
  require_once $_SERVER['DOCUMENT_ROOT']."/src/qh/classes/inf.class.php";
  
  use QH\Classes\RCS;
  use QH\Classes\Areas;
  use QH\Classes\Builders;
  use QH\Classes\Houses;
  use QH\Classes\Flats;
  use QH\Classes\Infs;
  
  $CT = new CTemplater("templates/tpl", "templates/tpl_c", "templates/configs", "templates/cache");
  
	$DB = new PDO("mysql:dbname=".DATA_BASE_NAME.";host=127.0.0.1", USER_NAME, USER_PASSWORD);
	$DB->exec("SET NAMES utf8");
  
  $RCM = new RCS($DB);
  $AM = new Areas($DB);
  $Builders = new Builders($DB);
  $HM = new Houses($DB);
  $FM = new Flats($DB);
  $INF = new Infs($DB);
  
  session_start();
?>