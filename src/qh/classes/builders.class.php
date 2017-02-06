<?php
  declare(strict_types = 1);
  namespace QH\Classes;
  
  require_once $_SERVER['DOCUMENT_ROOT']."/src/qh/classes/qh.class.php";
  require_once $_SERVER['DOCUMENT_ROOT']."/src/qh/structures/builder.class.php";
  
  use QH\Classes\QH;
  use QH\Structures\Builder;
  
  class Builders extends QH
  {
    
    public function add($builder) : bool
    {
      if ($builder instanceof Builder) {
        
        $add_builder_query = $this->dbc()->prepare("INSERT INTO `builders`
          (`name`)
          VALUES
          (:name)
        ");
        
        $add_builder_query->bindValue(":name", $builder->getName());
        
        return $add_builder_query->execute();
      }
      else return false;
    }
    
    public function remove($builder_name) : bool
    {
      if (is_string($builder_name) && !empty($builder_name)) {
        
        $remove_builder_query = $this->dbc()->prepare("DELETE FROM `builder` WHERE `name`=:name");
        $remove_builder_query->bindValue(":name", $builder_name);
        
        return $remove_builder_query->execute();
      }
      else return false;
    }
    
    public function change($old_name, $new_name)
    {
      return false;
    }
    
  }
  
?>
