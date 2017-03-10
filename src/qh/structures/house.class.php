<?php
  declare(strict_types = 1);
  namespace QH\Structures;
  
  require_once "flat.class.php";
  
  class House
  {
    const  count_flats_on_floor = 4;
    
    private $rc_name;
    private $address;
    
    private $count_floors;     //< Кол-во этажей
    private $count_porch;      //< Кол-во подъездов
    private $count_flats;      //< Кол-во квартир
    
    private $count_free_flats; //< Кол-во свободных квартир
    private $count_busy_flats; //< Кол-во сданых квартир
    private $count_flats_with_info; //< Кол-во квартир с указанной информацией
    private $flats;            //< Массив с объектами типа Flat (квартира)
    
    public function __construct(string $rc_name, string $address, int $count_floors, int $count_porch)
    {
      $this->rc_name = $rc_name;
      $this->address = $address;
      
      $this->count_floors = $count_floors;
      $this->count_porch = $count_porch;
      $this->count_flats = House::count_flats_on_floor * $this->count_floors * $this->count_porch;
      
      $this->count_free_flats = $this->count_flats;
      $this->count_busy_flats = 0;
      $this->count_flats_with_info = 0;
    }
    
    public function getRCName() : string
    {
      return $this->rc_name;
    }
    
    public function getAddress() : string
    {
      return $this->address;
    }
    
    public function getCountFloors() : int
    {
      return $this->count_floors;
    }
    
    public function getCountPorch() : int
    {
      return $this->count_porch;
    }
    
    public function getCountFlats() : int
    {
      return $this->count_flats;
    }
    
    public function getCountFreeFlats() : int
    {
      return $this->count_free_flats;
    }
    
    public function getCountBusyFlats() : int
    {
      return $this->count_busy_flats;
    }
    
    public function getCountFlatsWithInfo() : int
    {
      return $this->count_flats_with_info;
    }
    
    public function getFlats() : array
    {
      return $this->flats ?? array();
    }
    
    public function setCountFreeFlats(int $count_free_flats)
    {
      $this->count_free_flats = $count_free_flats;
    }
    
    public function setCountBusyFlats(int $count_busy_flats)
    {
      $this->count_busy_flats = $count_busy_flats;
    }
    
    public function addFlat(array $flats)
    {
      foreach ($flats as $flat) {
        if ($flat instanceof Flat) {
          if ((abs($flat->getPorch()) <= $this->count_porch) &&
              (abs($flat->getFloor()) <= $this->count_floors)
          ) {
            
            $this->flats[] = $flat;
            switch($flat->getStatus())
            {
              case FLAT_PASSED:
              {
                $this->count_free_flats--;
                $this->count_busy_flats++;
              } break;
            }
            
          }   
        }
      }
      $this->count_flats_with_info = count($this->flats);
    }
    
  }
  
?>