<?php
  declare(strict_types = 1);
  namespace QH\Structures;
  
  require_once $_SERVER['DOCUMENT_ROOT']."/src/qh/rc_status.consts.php";
  
  /*!
    
    @name Класс описывающий Жилой Комплекс
    
  */
  
  class RC
  {
    
    private $name;
    private $status;
    private $builder;
    private $address;
    
    public function __construct(string $name, int $status, string $builder, string $address)
    {
      $this->name = $name;
      $this->status = $status;
      $this->builder = $builder;
      $this->address = $address;
    }
    
    public function getName() : string
    {
      return $this->name;
    }
    
    public function getStatus() : int
    {
      return $this->status;
    }
    
    public function getBuilder() : string
    {
      return $this->builder;
    }
    
    public function getAddress() : string
    {
      return $this->address;
    }
    
  }
  
?>