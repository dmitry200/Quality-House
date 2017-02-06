<?php
  declare(strict_types = 1);
  namespace QH\Classes;
  
  require_once $_SERVER['DOCUMENT_ROOT']."/src/qh/classes/qh.class.php";
  require_once $_SERVER['DOCUMENT_ROOT']."/src/qh/structures/area.class.php";
  
  use QH\Classes\QH;
  use QH\Structures\Area;
  
  class Areas extends QH
  {
    
    public function add($area) : bool
    {
      if ($area instanceof Area) {
        
        $add_area_query = $this->dbc()->prepare("INSERT INTO `areas`
          (`name`)
          VALUES
          (:name)
        ");
        
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
    
    public function change($old_name, $new_name)
    {
      return false;
    }
    
  }
  
?>
