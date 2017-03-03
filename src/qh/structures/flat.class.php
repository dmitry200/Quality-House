<?php
  declare(strict_types = 1);
  namespace QH\Structures;
  
  require_once $_SERVER['DOCUMENT_ROOT']."/src/qh/flats_status.consts.php";
  
  class Flat
  {
    
    private $rc_name;
    private $home_address;
    private $porch; 
    private $floor;
    
    private $status;
    private $count_rooms;
    private $square;
    private $balcony;
    private $price;
    
    public function __construct(
      string $rc_name, 
      string $home_address, 
      int $porch, 
      int $floor, 
      int $count_rooms, 
      int $square,
      int $price,
      int $status = FLAT_RENT
    ){
      $this->rc_name = $rc_name;
      $this->home_address = $home_address;
      $this->porch = abs($porch);
      $this->floor = abs($floor);
      
      $this->count_rooms = $count_rooms;
      $this->square = abs($square);
      $this->balcony = $balcony;
      
      $this->status = $status;
      $this->price = $price;
    }
    
    public function getRCName() : string
    {
      return $this->rc_name;
    }
    
    public function getHomeAddress() : string
    {
      return $this->home_address;
    }
    
    public function getPorch() : int
    {
      return $this->porch;
    }
    
    public function getFloor() : int
    {
      return $this->floor;
    }
    
    public function getStatus() : int
    {
      return $this->status;
    }
    
    public function getCountRooms() : int
    {
      return $this->count_rooms;
    }
    
    public function getSquare() : int
    {
      return $this->square;
    }
    
    public function getBalcony() : bool
    {
      return $this->balcony;
    }
    
    public function getPrice() : int
    {
      return $this->price;
    }
    
    public function setBalcony(bool $isHaveBalcony)
    {
      $this->balcony = $isHaveBalcony;
    }
    
  }
  
?>