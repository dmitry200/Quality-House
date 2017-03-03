<?php
  declare(strict_types = 1);
  namespace QH\Classes;
  
  require_once $_SERVER['DOCUMENT_ROOT']."/src/qh/classes/qh.class.php";
  require_once $_SERVER['DOCUMENT_ROOT']."/src/qh/structures/flat.class.php";
  
  use QH\Classes\QH;
  use QH\Structures\Flat;
  
  class Flats extends QH
  {
    
    public function add($flat) : bool
    {
      if ($flat instanceof Flat) {
        
        $flat_add_query = $this->dbc()->prepare("call addFlat(:rc_name, :home_addr, :number_flat, :count_rms, :square, :balcony, :price, :flr, :porch)");
        
        $flat_add_query->bindValue(":rc_name", $flat->getRCName());
        $flat_add_query->bindValue(":home_addr", $flat->getHomeAddress());
        $flat_add_query->bindValue(":number_flat", $flat->getNumberFlat());
        $flat_add_query->bindValue(":count_rms", $flat->getCountRooms());
        $flat_add_query->bindValue(":square", $flat->getSquare());
        $flat_add_query->bindValue(":balcony", $flat->getBalcony());
        $flat_add_query->bindValue(":price", $flat->getPrice());
        $flat_add_query->bindValue(":flr", $flat->getFloor());
        $flat_add_query->bindValue(":porch", $flat->getPorch());
        
        return $flat_add_query->execute();
      }
      else return false;
    }
    
    public function remove($flat) : bool
    {
      
    }
    
    public function getFlats(string $rc_name, string $home_addres)
    {
      
    }
    
    public function change($old_name, $new_name)
    {
      return false;
    }
    
  }
  
  
?>