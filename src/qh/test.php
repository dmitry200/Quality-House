<?php
  
  require_once "../start.php";
  require_once "classes/areas.class.php";
  
  use QH\Classes\Areas;
  use QH\Structures\Area;
  
  $a = new Area("My");
  $AM = new Areas($DB);
  
  var_dump($AM->remove("My"));
  
?>