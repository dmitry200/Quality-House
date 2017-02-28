<?php
  
  require_once "start.php";
  
  use QH\Classes\RCM;
  
  
  if (isset($_SESSION['admin']) && !empty($_SESSION['admin'])) {
    
    $CT->assign("rcs", $RCM->getAll());
    
    
    $CT->Show("index.tpl");
    
  } else {
    CTools::Redirect("login.php");
  }
  
?>
