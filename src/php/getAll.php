<?php 

  if (!empty($_POST['area'])) {
    require_once "../start.php";
    
    $area_name = $_POST['area'];
    $rcs = $AM->getRCS($area_name);
    
    foreach ($rcs as $rc) {
      $rc_name = $rc->getName();
      $rc_address = $rc->getAddress();
      $rc_builder = $rc->getBuilder();
      $rc_text_status = $rc->getTextStatus();
      $rc_status = $rc->getStatus();
      $rc_count_houses = $rc->getCountHouses();
      $rc_houses = $HM->getHouses($rc->getName()) ?? 0;
      
      $rc_houses_flats = array();
      for ($i = 0; $i < count($rc_houses); $i++) {
        $rc_houses_flats = $FM->getFlats($rc->getName(), $rc_houses[$i]->getAddress());
        $rc_houses[$i]->addFlat($rc_houses_flats);
        
        if ($rc_status == PASSED) {
          $rc_houses[$i]->setCountBusyFlats($rc_houses[$i]->getCountFreeFlats());
        }
      }
      
      
      include "../blocks/rcs.tpl";
    }
    
  }
  
?>
