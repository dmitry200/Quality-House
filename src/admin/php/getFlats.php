<?php
  
  if (!empty($_POST['rc_name']) && !empty($_POST['home_address'])) {
    
    require_once "../start.php";
    
    $flats = $FM->getFlats($_POST['rc_name'], $_POST['home_address']);
    
    echo "<input type='hidden' name='rc_name' value='".$_POST['rc_name']."'>";
    echo "<input type='hidden' name='home_address' value='".$_POST['home_address']."'>";
    echo "
      <tr>
        <th>№ квартиры</th>
        <th>Подъезд</th>
        <th>Этаж</th>
        <th>Кол-во комнат</th>
        <th>Балкон</th>
        <th>Цена аренды (в месяц)</th>
        <th>Статус</th>
        <th>Выбрать</th>
      </tr>
    ";
      
    foreach ($flats as $flat) {
      echo "<tr>";
      echo "<td>".$flat->getNumberFlat()."</td>";
      echo "<td>".$flat->getPorch()."</td>";
      echo "<td>".$flat->getFloor()."</td>";
      echo "<td>".$flat->getCountRooms()."</td>";
      echo "<td>".($flat->getBalcony() == 1 ? "Есть" : "Нету")."</td>";
      echo "<td>".$flat->getPrice()."</td>";
      echo "<td>".($flat->getStatus() == 1 ? "Не сдана" : "Сдана")."</td>";
      echo "<td><input type='checkbox' name='select_flat[]' value='".$flat->getNumberFlat()."' class='form-control'></td>";
      echo "</tr>";
    }
    
  }
  
?>