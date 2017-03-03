<?php
  declare(strict_types = 1);
  namespace QH\Classes;
  
  require_once $_SERVER['DOCUMENT_ROOT']."/src/qh/classes/qh.class.php";
  require_once $_SERVER['DOCUMENT_ROOT']."/src/qh/structures/area.class.php";
  require_once $_SERVER['DOCUMENT_ROOT']."/src/qh/structures/rc.class.php";
  
  use QH\Classes\QH;
  use QH\Structures\Area;
  use QH\Structures\RC;
  
  class Areas extends QH
  {
    
    public function add($area) : bool
    {
      if ($area instanceof Area) {
        
        $add_area_query = $this->dbc()->prepare("call addArea(:name)");
        
        $add_area_query->bindValue(":name", $area->getName());
        
        return $add_area_query->execute();
      }
      else return false;
    }
    
    public function remove($area_name) : bool
    {
      if (is_string($area_name) && !empty($area_name)) {
        
        $remove_area_query = $this->dbc()->prepare("DELETE FROM `areas` WHERE `name`=:name");
        $remove_area_query->bindValue(":name", $area_name);
        
        return $remove_area_query->execute();
      }
      else return false;
    }
    
    public function getAll()
    {
      $db_areas = $this->get("SELECT `name` FROM `areas` ORDER BY `name`");
      
      $areas = array();
      foreach ($db_areas as $db_area) {
        $areas[] = new Area($db_area['name']);
      }
      
      return $areas;
    }
    
    public function getRCS(string $area_name)
    {
      $db_rcs = $this->get("call getRCS(:area)", [":area" => $area_name]);
      
      $rcs = array();
      foreach ($db_rcs as $db_rc) {
        $new_rc = new RC($db_rc['rc_name'], $db_rc['rc_address'], $db_rc['rc_builder'], (int)$db_rc['rc_status']);
        
        $new_rc->setTextStatus($db_rc['rc_text_status']);
        $new_rc->setArea($db_rc['rc_area_name']);
        
        $count_homes = $this->get("call getCountHomes(:rc_name)", [":rc_name" => $db_rc['rc_name']])[0]['count_homes'];
        
        $new_rc->setCountHouses((int)$count_homes);
        
        $rcs[] = $new_rc;
      }
      
      return $rcs;
    }
    
    public function change($old_name, $new_name)
    {
      return false;
    }
    
  }
  
?>
