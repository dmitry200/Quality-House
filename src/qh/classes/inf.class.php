<?php
  declare(strict_types = 1);
  namespace QH\Classes;
  
  require_once $_SERVER['DOCUMENT_ROOT']."/src/qh/classes/qh.class.php";
  
  use QH\Classes\QH;
  
  class Infs extends QH
  {
    
    public function add($inf) : bool
    {
      $add_inf_query = $this->dbc()->prepare("INSERT INTO `inf`
        (`id_area`, `address`)
        VALUES
        ((SELECT `id_area` FROM `areas` WHERE `name`=:area_name), :addr)
      ");
      
      return $add_inf_query->execute($inf);
    }
    
    public function remove($inf)
    {
      return $this->get("DELETE FROM `inf` WHERE `id_inf`=:id_infs", [":id_infs" => $inf]);
    }
    
    public function getAll() : array
    {
      return $this->get("SELECT i.id_inf, a.name, i.address FROM `inf` i INNER JOIN `areas` a ON a.id_area=i.id_area ORDER BY `address`");
    }
    
    public function getInfsByArea($area) : array
    {
      $db_infs = $this->get("SELECT i.address FROM `inf` i INNER JOIN `areas` a ON a.id_area=i.id_area WHERE a.name=:area ORDER BY `address`", [":area" => $area]);
      
      $infs = array();
      foreach ($db_infs as $db_inf) {
        $infs[] = $db_inf['address'];
      }
      
      return $infs;
    }
    
    public function change($old_inf, $new_inf)
    {
      //...
    }
    
    
  }
  
  
?>
