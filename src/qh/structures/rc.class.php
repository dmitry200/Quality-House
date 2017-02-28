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
    private $area_name;
    private $status;
    private $builder;
    private $address;
    private $text_status;
    
    public function __construct(string $name, string $address, string $builder, int $status = BUILD)
    {
      $this->name = $name;
      $this->address = $address;
      $this->builder = $builder;
      $this->status = $status;
      
      $this->area_name = "none";
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
    
    public function getTextStatus() : string
    {
      return $this->text_status;
    }
    
    public function getAreaName() : string
    {
      return $this->area_name;
    }
    
    public function setTextStatus(string $status)
    {
      $this->text_status = $status;
    }
    
    public function setArea(string $area_name)
    {
      $this->area_name = $area_name;
    }
    
  }
  
?>