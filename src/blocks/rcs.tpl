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
        <td></td>
        <td><?= $rc_status; ?></td>
      </tr>
    </table>
    <hr>
    <h3>Квартиры</h3>
    <table border="1" style="text-align: center;" width="100%">
      <tr>
        <th>Кол-во квартир</th>
        <th>Кол-во сданых квартир</th>
        <th>Кол-во свободных квартир</th>
      </tr>
    </table>
    <h3>Дома</h3>
    <table border="1" style="text-align: center;" width="100%">
      <tr>
        <th>Адрес дома</th>
        <th>Кол-во подьъездов</th>
        <th>Кол-во квартир</th>
      </tr>
    </table>
  </div>
</fieldset>