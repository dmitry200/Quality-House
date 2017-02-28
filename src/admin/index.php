<?php
  
  require_once "start.php";
  
  use QH\Classes\RCM;
  use QH\Classes\Builders;
  use QH\Structures\Builder;
  
  const THIS = "index.php";
  
  if (isset($_SESSION['admin']) && !empty($_SESSION['admin'])) {
    
    if (!empty($_POST['addBuilderButton'])) {
      
      $builder_name = htmlspecialchars($_POST['builder']);
      
      if ($Builders->add(new Builder($builder_name))) {
        CTools::Redirect(THIS);
      }
      
    }
    
    
    $CT->assign("builders", $Builders->getAll());
    
    $CT->Show("index.tpl");
  } else {
    CTools::Redirect("login.php");
  }
  
?>
