<?php
  
  if (!empty($_POST['rc_name'])) {
    
    require_once "../start.php";
    
    $addresses = $RCM->getHouses($_POST['rc_name']);
    
    foreach ($addresses as $address) {
      echo "<option value='".$address['address']."'>".$address['address']."</option>";
    }
    
  }
  
?>
