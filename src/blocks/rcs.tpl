<fieldset>
  <legend><h4><?= $rc_name; ?></h4></legend>
  <div class="about_rc">
    <table border="1" style="text-align: center;" width="100%">
      <tr>
        <th>Адрес</th>
        <th>Застройщик</th>
        <th>Кол-во домов</th>
        <th>Статус</th>
      </tr>
      <tr>
        <td><a href="geo.php?place=<?= $rc_name.", ".$rc_address."&area=".$area_name."&rc_name=".$rc_name; ?>"><?= $rc_address; ?></a></td>
        <td><?= $rc_builder; ?></td>
        <td><?= $rc_count_houses; ?></td>
        <td><?= $rc_text_status; ?></td>
      </tr>
    </table>
    <hr>
    <h3>Дома</h3>
    <table border="1" style="text-align: center;" width="100%">
      <tr>
        <th>Адрес</th>
        <th>Этажей</th>
        <th>Подъездов</th>
        <th>Квартир</th>
        <th>Квартир с инф.</th>
        <th>Свободно квартир</th>
        <th>Сдано квартир</th>
      </tr>
      <?php
        
        if (!empty($rc_houses)) {
          foreach ($rc_houses as $rc_house) {
            echo "<tr>";
            echo "<td>".$rc_house->getAddress()."</td>";
            echo "<td>".$rc_house->getCountFloors()."</td>";
            echo "<td>".$rc_house->getCountPorch()."</td>";
            echo "<td>".$rc_house->getCountFlats()."</td>";
            echo "<td>".$rc_house->getCountFlatsWithInfo()."</td>";
            echo "<td>".$rc_house->getCountFreeFlats()."</td>";
            echo "<td>".$rc_house->getCountBusyFlats()."</td>";
            echo "</tr>";
          }
        }
        
      ?>
    </table>
    <hr>
    <?php
      
      foreach ($rc_houses as $rc_house) {
        echo "<h1>".$rc_house->getAddress()."</h1>";
      
        echo "<div class='flats'>";
        foreach ($rc_house->getFlats() as $one_flat) {
          echo "<div class='one_flat'>";
          echo "<h4>".$one_flat->getNumberFlat()."</h4>";
          echo "<p>Подъезд: ".$one_flat->getPorch()."</p>";
          echo "<p>Этаж: ".$one_flat->getFloor()."</p>";
          echo "<p>Комнат: ".$one_flat->getCountRooms()."</p>";
          echo "<p>Общая площадь: ".$one_flat->getSquare()." кв. м.</p>";
          echo "<p>Балкон: ".($one_flat->getBalcony() == 1 ? "Есть" : "Нету")."</p>";
          echo "<p>Цена аренды (в месяц): ".$one_flat->getPrice()." руб.</p>";
          echo "<p>Статус: ".($one_flat->getStatus() == 1 ? "Не сдано" : "Сдано")."</p>";
          
          if (($one_flat->getStatus() == FLAT_RENT) && ($rc_status == BUILD)) {
            echo "<form name='changeFlatStatusForm' method='POST'>";
            echo "<input type='hidden' name='rc_name' value='".$one_flat->getRCName()."'>";
            echo "<input type='hidden' name='home_address' value='".$one_flat->getHomeAddress()."'>";
            echo "<input type='hidden' name='nf' value='".$one_flat->getNumberFlat()."'>";
            echo "<input type='hidden' name='status' value='2'>";
            echo "<input type='submit' name='changeFlatStatusButton' value='Арендовать'>";        
            echo "</form>";
          }
          
          echo "</div>";
        }
        echo "</div>";
      }
      
      
    ?>
  </div>
</fieldset>
<br>