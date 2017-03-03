<?php
  declare(strict_types = 1);
  namespace QH\Classes;
  
  require_once $_SERVER['DOCUMENT_ROOT']."/src/qh/classes/qh.class.php";
  require_once $_SERVER['DOCUMENT_ROOT']."/src/qh/structures/house.class.php";
  require_once $_SERVER['DOCUMENT_ROOT']."/src/qh/structures/flat.class.php";
  
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
    
    public function getHouses(string $rc_name) : array
    {
      $db_houses = $this->get("call getHomes(:rc_name)", [":rc_name" => $rc_name]);
      
      $houses = array();
      foreach ($db_houses as $db_house) {
        $houses[] = new House($rc_name, $db_house['address'], (int)$db_house['count_floors'], (int)$db_house['count_proch']);
      }
      
      return $houses;
    }
    
    
    public function change($old_name, $new_name)
    {
      return false;
    }
  }
  
?>