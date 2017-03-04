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
        
        $isFlatExists = $this->get("SELECT isFlatExists(:rc_name, :home_address, :number_flat) as flt;",
          [
            ":rc_name" => $flat->getRCName(),
            ":home_address" => $flat->getHomeAddress(),
            ":number_flat" => $flat->getNumberFlat()
          ]
        )[0]['flt'];
        
        if ($isFlatExists == 0) {
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
      else return false;
    }
    
    public function remove($flat) : bool
    {
      
    }
    
    public function getFlats(string $rc_name, string $home_address) : array
    {
      $db_falts = $this->get("call getFlats(:rc_name, :home_address)", [":rc_name" => $rc_name, ":home_address" => $home_address]);
      
      $flats = array();
      foreach ($db_falts as $db_flat) {
        $flats[] = new Flat(
          $rc_name,
          $home_address,
          (int)$db_flat['porch'],
          (int)$db_flat['floor'],
          (int)$db_flat['count_rooms'],
          (int)$db_flat['square'],
          (int)$db_flat['price_flat'],
          (int)$db_flat['number_flat'],
          (int)$db_flat['stat']
        );
      }
      
      return $flats;
    }
    
    public function change($old_name, $new_name)
    {
      return false;
    }
    
  }
  
  
?>