<?php
  declare(strict_types = 1);
  namespace QH\Structures;
  
  require_once $_SERVER['DOCUMENT_ROOT']."/src/qh/flats_status.consts.php";
  
  class Flat
  {
    
    private $porch; 
    private $floor;
    private $status;
    private $count_rooms;
    private $square;
    private $balcony;
    private $repair;
    
    public function __construct(int $porch, int $floor, int $count_rooms, int $square, int $status = FLAT_RENT)
    {
      $this->porch = abs($porch);
      $this->floor = abs($floor);
      $this->count_rooms = $count_rooms;
      $this->square = abs($square);
      $this->balcony = $balcony;
      $this->repair = $repair;
      $this->status = $status;
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
    
    public function getRepair() : string
    {
      return $this->repair;
    }
    
    public function setRepair(string $repair)
    {
      $this->repair = $repair;
    }
    
    public function setBalcony(bool $isHaveBalcony)
    {
      $this->balcony = $isHaveBalcony;
    }
    
  }
  
?>