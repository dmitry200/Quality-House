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
        <td><?= $rc_address; ?></td>
        <td><?= $rc_builder; ?></td>
        <td><?= $rc_count_houses; ?></td>
        <td><?= $rc_status; ?></td>
      </tr>
    </table>
    <hr>
    <h3>Дома</h3>
    <table border="1" style="text-align: center;" width="100%">
      <tr>
        <th>Адрес</th>
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
    <form name="changeFlatStatus" method="POST">
      <table border="1" style="text-align: center;" width="100%">
        <tr>
          <td>Адрес дома</td>
          <td>Квартиры</td>
          <td>Аренда</td>
        </tr>
        <?php
          
          foreach ($rc_houses_flats as $rc_houses_flat) {
            echo "<tr>";
            foreach ($rc_houses_flat as $flat) {
              
            }
            
            echo "</tr>";
          }
          
        ?>
      </table>
      <select name="flat_">
        
      </select>
    </form>
  </div>
</fieldset>
<br>