<?php
  
  require_once "../start.php";
  
  $search = $DB->prepare("call searchFlats(:cr, :b, :s, :p)");
  
  $search->bindValue(":cr", $_POST['count_rooms']);
  $search->bindValue(":b", $_POST['balcony']);
  $search->bindValue(":s", $_POST['square']);
  $search->bindValue(":p", $_POST['price']);
  
  $search->execute();
  
  $data = $search->fetchAll();
  
  for($i = 0; $i < count($data); $i++)
  {
    $result[$data[$i]['name']] = $data;
  }
 
  
  foreach ($result as $key => $res) {
    echo "<fieldset>";
    echo "<legend>".$key."</legend>";
    echo "<div class='info'>";
    for ($i = 0; $i < count($res); $i++) {
      echo "<div class='one_flat'>";
      echo "<p>Дом: <small>".$data[$i]['address']."</small></p>";
      echo "<p>Подъезд: ".$data[$i]['porch']."</p>";
      echo "<p>Этаж: ".$data[$i]['floor']."</p>";
      echo "<p>Комнат: ".$data[$i]['count_rooms']."</p>";
      echo "<p>Общая площадь: ".$data[$i]['square']." кв. м.</p>";
      echo "<p>Балкон: ".($data[$i]['balcony'] == 1 ? "Есть" : "Нету")."</p>";
      echo "<p>Цена аренды (в месяц): ".$data[$i]['price']." руб.</p>";
      echo "<p>Статус: ".($data[$i]['stat'] == 1 ? "Не сдано" : "Сдано")."</p>";
      echo "</div>";
    }
    echo "</div>";
    echo "</fieldset>";
  }
    
  
  
?>