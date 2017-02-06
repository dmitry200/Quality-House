<?php
  declare(strict_types = 1);
  namespace QH\Structures;
  
  class StatusRC
  {
    private $description;    
    
    public function __construct(string $description)
    {
      $this->description = $description;
    }
    
    public function getDescription() : string
    {
      return $this->description;
    }
    
    public function setDescription(string $description)
    {
      $this->description = $description;
    }
    
  }
  
?>