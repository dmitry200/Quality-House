<?php 

  if (!empty($_POST['area'])) {
    require_once "../start.php";
    
    $area_name = $_POST['area'];
    $rcs = $AM->getRCS($area_name);
    
    foreach ($rcs as $rc) {
      $rc_name = $rc->getName();
      $rc_address = $rc->getAddress();
      $rc_builder = $rc->getBuilder();
      $rc_status = $rc->getTextStatus();
      
      include "../blocks/rcs.tpl";
    }
    
  }
  
?>
