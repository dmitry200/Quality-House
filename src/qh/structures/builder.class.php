<?php 
  declare(strict_types = 1);
  namespace QH\Structures;
  
  class Builder
  {
    private $name;    
    
    public function __construct(string $name)
    {
      $this->name = $name;
    }
    
    public function getName() : string
    {
      return $this->name;
    }
    
    public function setName(string $name)
    {
      $this->name = $name;
    }
    
  }
  
?>