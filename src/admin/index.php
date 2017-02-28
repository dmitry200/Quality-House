<?php
  
  require_once "start.php";
  
  use QH\Classes\RCM;
  use QH\Classes\Builders;
  use QH\Structures\RC;
  use QH\Structures\Area;
  use QH\Structures\Builder;
  
  const THIS = "index.php";
  
  if (isset($_SESSION['admin']) && !empty($_SESSION['admin'])) {
    
    if (!empty($_POST['addBuilderButton'])) {
      
      $builder_name = htmlspecialchars($_POST['builder']);
      
      if ($Builders->add(new Builder($builder_name))) {
        CTools::Redirect(THIS);
      }
      
    }
    
    if (!empty($_POST['addAreaButton'])) {
      
      $area_name = htmlspecialchars($_POST['area_name']);
      
      if ($AM->add(new Area($area_name))) {
        CTools::Redirect(THIS);
      }
      
    }
    
    if (!empty($_POST['addRCButton'])) {
      $rc_area_name = htmlspecialchars($_POST['rc_area_name']);
      $rc_name = htmlspecialchars($_POST['rc_name']);
      $rc_address = htmlspecialchars($_POST['rc_address']);
      $rc_builder = htmlspecialchars($_POST['rc_builder']);
      
      $new_rc = new RC($rc_name, $rc_address, $rc_builder);
      $new_rc->setArea($rc_area_name);
      
      if ($RCM->add($new_rc)) {
        CTools::Redirect(THIS);
      }
    }
    
    if (!empty($_POST['changeStatusRCButton'])) {
      $rc_name = htmlspecialchars($_POST['rc_name']);
      $rc_status = htmlspecialchars($_POST['rc_status']);
      
      if ($RCM->changeStatus($rc_name, $rc_status)) {
        CTools::Redirect(THIS);
      }
    }
    
    $rcs = $RCM->getAll();
    $rcsByArea = array();
    for ($i = 0; $i < count($rcs); $i++) {
      $rcsByArea[$rcs[$i]->getAreaName()][] = $rcs[$i];
    }
    
    $CT->assign("areas", $AM->getAll());
    $CT->assign("builders", $Builders->getAll());
    $CT->assign("rcsByArea", $rcsByArea);
    $CT->assign("rcs", $RCM->getAll());
    $CT->assign("statutses", $RCM->getStatuses());
    
    
    $CT->Show("index.tpl");
  } else {
    CTools::Redirect("login.php");
  }
  
?>
