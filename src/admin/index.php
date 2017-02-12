<?php
  
  require_once "start.php";
  
  
  
  if (isset($_SESSION['admin']) && !empty($_SESSION['admin'])) {
    
    $CT->assign("rcs", $RCM->getRCM());
    
    
    $CT->Show("index.tpl");
    
  } else {
    CTools::Redirect("login.php");
  }
  
?>
