<?php
  
  require_once "../start.php";
  require_once "classes/rcs.class.php";
  require_once "classes/builders.class.php";
  
  use QH\Classes\RCS;
  use QH\Structures\RC;
  
  $rc = new RC("Имя", BUILD, "ПИК", "Address");
  
  $rcs = new RCS($DB);
  
  //$rcs->remove("Имя");
  //var_dump($rcs->add($rc));
  
?>