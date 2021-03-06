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
          $home = $this->get("
            SELECT `count_floors`, `count_proch` FROM `homes` INNER JOIN `rc_home` ON homes.id_home=rc_home.id_home
              WHERE rc_home.id_rc=(SELECT `id_rc` FROM `rcs` WHERE `name`=:rc_name) AND homes.address=:home_address;
          ", [":rc_name" => $flat->getRCName(), ":home_address" => $flat->getHomeAddress()])[0];
          
          if (($flat->getFloor() <= $home['count_floors']) && ($flat->getPorch() <= $home['count_proch'])) {
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
      else return false;
    }
    
    public function remove($flat) : bool
    {
      $remove_flat_query = $this->dbc()->prepare("call deleteFlatFromHome(:rn, :ha, :nf)");
      
      $remove_flat_query->bindValue(":rn", $flat['rc_name']);
      $remove_flat_query->bindValue(":ha", $flat['home_addr']);
      $remove_flat_query->bindValue(":nf", $flat['nf']);
      
      return $remove_flat_query->execute();
    }
    
    public function getFlats(string $rc_name, string $home_address) : array
    {
      $db_falts = $this->get("call getFlats(:rc_name, :home_address)", [":rc_name" => $rc_name, ":home_address" => $home_address]);
      
      $flats = array();
      foreach ($db_falts as $db_flat) {
        $new_flat = new Flat(
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
        $new_flat->setBalcony((int)$db_flat['balcony']);
        
        $flats[] = $new_flat;
      }
      
      return $flats;
    }
    
    public function changeFlatStatus(string $rc_name, string $home_address, int $number_flat, int $status)
    {
      $change_status_query = $this->dbc()->prepare("call changeStatusFlat(:rc_name, :home_addr, :nf, :status)");
      
      $change_status_query->bindValue(":rc_name", $rc_name);
      $change_status_query->bindValue(":home_addr", $home_address);
      $change_status_query->bindValue(":nf", $number_flat);
      $change_status_query->bindValue(":status", $status);
      
      return $change_status_query->execute();
    }
    
    public function change($old_name, $new_name)
    {
      return false;
    }
    
  }
  
  
?>