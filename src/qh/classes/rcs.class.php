<?php
  declare(strict_types = 1);
  namespace QH\Classes;
  
  require_once $_SERVER['DOCUMENT_ROOT']."/src/qh/classes/qh.class.php";
  require_once $_SERVER['DOCUMENT_ROOT']."/src/qh/structures/rc.class.php";
  
  use QH\Classes\QH;
  use QH\Structures\RC;
  
  class RCS extends QH
  {
    
    public function add($rc) : bool
    {
      if ($rc instanceof RC) {
        
        $add_rc_query = $this->dbc()->prepare("call addRC(:id_builder, :name, :address)");
        
        
        
        return $add_rc_query->execute(); 
      }
      else return false;
    }
    
    public function remove($rc_name) : bool
    {
      if (is_string($rc_name) && !empty($rc_name)) {
        
        $remove_builder_query = $this->dbc()->prepare("DELETE FROM `rcs` WHERE `name`=:name");
        $remove_builder_query->bindValue(":name", $rc_name);
        
        return $remove_builder_query->execute();
      }
      else return false;
    }
    
    public function change($old_name, $new_name)
    {
      return false;
    }
    
    public function getAll()
    {
      
    }
    
  }
  
  
  
?>
