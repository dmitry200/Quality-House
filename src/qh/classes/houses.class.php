<?php
  declare(strict_types = 1);
  namespace QH\Classes;
  
  require_once $_SERVER['DOCUMENT_ROOT']."/src/qh/classes/qh.class.php";
  require_once $_SERVER['DOCUMENT_ROOT']."/src/qh/structures/house.class.php";
  
  use QH\Classes\QH;
  use QH\Structures\House;
  use QH\Structures\Flat;
  
  class Houses extends QH
  {
    public function add($house) : bool
    {
      if ($house instanceof House) {
         
         $add_house_query = $this->dbc()->prepare("call addHome(:rc_name, :addr, :count_flts, :count_flrs, :count_prch)");
         
         $add_house_query->bindValue(":rc_name", $house->getRCName());
         $add_house_query->bindValue(":addr", $house->getAddress());
         $add_house_query->bindValue(":count_flts", $house->getCountFlats());
         $add_house_query->bindValue(":count_flrs", $house->getCountFloors());
         $add_house_query->bindValue(":count_prch", $house->getCountPorch());
         
         return $add_house_query->execute();
      }
      else return false;
    }
    
    public function remove($house_address) : bool
    {
      
    }
    
    public function getAll()
    {
      
    }
    
    
    
    
    public function change($old_name, $new_name)
    {
      return false;
    }
  }
  
?>