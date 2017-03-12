<?php

  if (!empty($_POST['rc_name'])) {
    
    require_once "../start.php";
    
    $houses = $HM->getHouses($_POST['rc_name']);
    
    echo "<input type='hidden' name='rc_name' value='".$_POST['rc_name']."'>";
    echo "
      <tr>
        <th>Адрес</th>
        <th>Кол-во этажей</th>
        <th>Кол-во подъездов</th>
        <th>Выбрать</th>
      </tr>
    ";
      
    foreach ($houses as $house) {
      echo "<tr>";
      echo "<td>".$house->getAddress()."</td>";
      echo "<td>".$house->getCountFloors()."</td>";
      echo "<td>".$house->getCountPorch()."</td>";
      echo "<td><input type='checkbox' name='select_d_house[]' value='".$house->getAddress()."' class='form-control'></td>";
      echo "</tr>";
    }
    
  }

?>