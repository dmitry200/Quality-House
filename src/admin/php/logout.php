<?php
  
  
  require_once "../start.php";
  
  if (isset($_SESSION['admin']) && !empty($_SESSION['admin'])) {
    unset($_SESSION['admin']);
    
    CTools::Redirect("../index.php");
  }
  else CTools::Redirect("../index.php");

?>