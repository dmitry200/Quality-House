<?php
  declare(strict_types = 1);
  namespace QH\Structures;
  
  require_once "flat.class.php";
  
  class House
  {
    const  count_flats_on_floor = 4;
    
    private $count_floors;
    private $count_porch;
    private $count_flats;
    
    private $count_free_flats;
    private $count_busy_flats;
    private $flats;
    
    public function __construct(int $count_floors, int $count_porch)
    {
      $this->count_floors = $count_floors;
      $this->count_porch = $count_porch;
      $this->count_flats = House::count_flats_on_floor * $this->count_floors * $this->count_porch;
      
      $this->count_free_flats = $this->count_flats;
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
    
    public function addFlat(array $flats)
    {
      foreach ($flats as $flat) {
        if ($flat instanceof Flat) {
          if ((abs($flat->getPorch()) < $this->count_porch) &&
              (abs($flat->getFloor()) < $this->count_floors)
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
    }
    
  }
  
  $h = new House(15, 3);
  
  $h->addFlat([new Flat(2, 13, 2, 25, (int)FLAT_PASSED)]);
  $h->addFlat([new Flat(1, 1, 2, 25, (int)FLAT_PASSED)]);
  $h->addFlat([new Flat(1, 1, 2, 25, (int)FLAT_PASSED)]);
  $h->addFlat([new Flat(1, 1, 2, 25)]);
  
  echo "<pre>";
  print_r($h);
  echo "</pre>";
  
  
?>