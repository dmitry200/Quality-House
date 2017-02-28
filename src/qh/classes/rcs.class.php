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
        
        $add_rc_query = $this->dbc()->prepare("call addRC(:area_name, :name, :address, :builder, :status)");
        
        $add_rc_query->bindValue(":area_name", $rc->getAreaName());
        $add_rc_query->bindValue(":name", $rc->getName());
        $add_rc_query->bindValue(":address", $rc->getAddress());
        $add_rc_query->bindValue(":builder", $rc->getBuilder());
        $add_rc_query->bindValue(":status", $rc->getStatus());
        
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
    
    public function getAll()
    {
      $db_rcs = $this->get("SELECT * FROM `all_rcs`;");
      
      $rcs = array();
      foreach ($db_rcs as $db_rc) {
        $new_rc = new RC($db_rc['rc_name'], $db_rc['rc_address'], $db_rc['rc_builder'], (int)$db_rc['rc_status']);
        
        $new_rc->setTextStatus($db_rc['rc_text_status']);
        $new_rc->setArea($db_rc['rc_area_name']);
        
        $rcs[] = $new_rc;
      }
      
      return $rcs;
    }
    
    public function changeStatus(string $rc_name, string $status) : bool
    {
      $change_status_query = $this->dbc()->prepare("call changeStatusRC(:rc_name, :status)");
      
      $change_status_query->bindValue(":rc_name", $rc_name);
      $change_status_query->bindValue(":status", $status);
      
      return $change_status_query->execute();
    }
    
    public function getStatuses()
    {
      return $this->get("SELECT `description` FROM `rc_status` ORDER BY `description`");
    }
    
    public function change($old_name, $new_name)
    {
      return false;
    }
    
  }
  
  
  
?>
