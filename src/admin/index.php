<?php
  
  require_once "start.php";
  
  use QH\Classes\RCM;
  use QH\Classes\Builders;
  use QH\Structures\RC;
  use QH\Structures\Area;
  use QH\Structures\Builder;
  use QH\Structures\House;
  use QH\Structures\Flat;
  
  const THIS = "index.php";
  
  echo rand() % 1000000 + 25000;
  
  
  
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
    
    if (!empty($_POST['deleteAreaButton'])) {
      $select_area = $_POST['select_area'];
      
      for ($i = 0; $i < count($select_area); $i++) {
        $AM->remove($select_area[$i]);
      }
      
      CTools::Redirect(THIS);
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
		
		if (!empty($_POST['deleteRCButton'])) {
			$select_rcs = $_POST['select_rc'];
      
			for ($i = 0; $i < count($select_rcs); $i++) {
        $RCM->remove($select_rcs[$i]);
      }
      
      CTools::Redirect(THIS);
		}
    
    if (!empty($_POST['addHomeToRCButton'])) {
      $rc_name = htmlspecialchars($_POST['rc_name']);
      $home_address = htmlspecialchars($_POST['home_address']);
      $home_count_floors = htmlspecialchars($_POST['home_count_floors']);
      $home_count_porch = htmlspecialchars($_POST['home_count_porch']);
      
      $house = new House($rc_name, $home_address, $home_count_floors, $home_count_porch);
      
      if ($HM->add($house)) {
        CTools::Redirect(THIS);
      }
    }
    
    if (!empty($_POST['addFlatToHouseButton'])) {
      $rc_name = htmlspecialchars($_POST['rc_name_for_flat']);
      $home_address = htmlspecialchars($_POST['home_address']);
      $flt_porch = htmlspecialchars($_POST['flt_porch']);
      $flt_floor = htmlspecialchars($_POST['flt_floor']);
      $flt_count_rooms = htmlspecialchars($_POST['flt_count_rooms']);
      $flt_square = htmlspecialchars($_POST['flt_square']);
      $flt_balcony = htmlspecialchars($_POST['flt_balcony']);
      $flt_price = htmlspecialchars($_POST['flt_price']);
      $flt_number = htmlspecialchars($_POST['flt_number']);
      
      $flat = new Flat(
        $rc_name, 
        $home_address, 
        $flt_porch,
        $flt_floor,
        $flt_count_rooms,
        $flt_square,
        $flt_price,
        $flt_number
       );
      $flat->setBalcony($flt_balcony);
      
      
      if ($FM->add($flat)) {
        CTools::Redirect(THIS);
      }
      
    }
    
    if (!empty($_POST['deleteFlatButton'])) {
      $rc_name = htmlspecialchars($_POST['rc_name']);
      $home_address = htmlspecialchars($_POST['home_address']);
      $select_flat = $_POST['select_flat'];
      
      for ($i = 0; $i < count($select_flat); $i++) {
        $FM->remove(["rc_name" => $rc_name, "home_addr" => $home_address, "nf" => $select_flat[$i]]);
      }
      
      CTools::Redirect(THIS);
    }
    
    if (!empty($_POST['changeFlatButton'])) {
      $rc_name = htmlspecialchars($_POST['rc_name']);
      $home_address = htmlspecialchars($_POST['home_address']);
      $flt_stat = $_POST['flt_stat'];
      $select_flat = $_POST['select_flat'];
      
      for ($i = 0; $i < count($select_flat); $i++) {
        $FM->changeFlatStatus($rc_name, $home_address, $select_flat[$i], $flt_stat[$i]);
      }
      
      CTools::Redirect(THIS);
    }
    
    if (!empty($_POST['addNewInfButton'])) {
      $area_name = $_POST['area_name'];
      $inf_address = htmlspecialchars($_POST['inf_address']);
      $INF->add([":area_name" => $area_name, ":addr" => $inf_address]);
      
      CTools::Redirect(THIS);
    }
    
    if (!empty($_POST['deleteInfButton'])) {
      $select_inf = $_POST['select_inf'];
      
      for ($i = 0; $i < count($select_inf); $i++) {
        $INF->remove($select_inf[$i]);
      }
      
      CTools::var_dump($infsByArea);
    }
    
    
    if (!empty($_POST['deleteHouseButton'])) {
      $rc_name = $_POST['rc_name'];
      $select_d_house = $_POST['select_d_house'];
      
      for ($i = 0; $i < count($select_d_house); $i++) {
        $HM->remove([":rc_name" => $rc_name, ":home_addr" => $select_d_house[$i]]);
      }
      
      CTools::Redirect(THIS);
    }
    
    
    $infs = $INF->getAll();
    $infsByArea = array();
    for ($i = 0; $i < count($infs); $i++) {
      $infsByArea[$infs[$i]['name']][] = $infs[$i];
    }
    
    $rcs = $RCM->getAll();
    $rcsByArea = array();
    for ($i = 0; $i < count($rcs); $i++) {
      $rcsByArea[$rcs[$i]->getAreaName()][] = $rcs[$i];
    }
    
    ksort($rcsByArea);
    
    $CT->assign("areas", $AM->getAll());
    $CT->assign("builders", $Builders->getAll());
    $CT->assign("rcsByArea", $rcsByArea);
    $CT->assign("infsByArea", $infsByArea);
    $CT->assign("rcs", $RCM->getAll());
    $CT->assign("statutses", $RCM->getStatuses());
    
    $CT->Show("index.tpl");
  
  } else {
    CTools::Redirect("login.php");
  }
  
?>
