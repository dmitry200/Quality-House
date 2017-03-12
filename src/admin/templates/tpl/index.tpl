<!DOCTYPE html>
<html>
	<head>
		<title>Панель администратора</title>
		<meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
	</head>
	<body>
    <header class="container">
      <div class="row">
        <div class="col-md-12"><h1>Панель управления Quality House</h1></div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <nav>
            <a href="#">Руководство</a>
            <a href="video.php">Видеоруководство</a>
            <a href="php/logout.php">Выйти</a>
          </nav>
        </div>
      </div>
    </header>
    <hr>
    
    <div class="container-fluid">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#rcs" data-toggle="tab">Жилые комплексы</a></li>
        <li><a href="#houses" data-toggle="tab">Дома</a></li>
        <li><a href="#flats" data-toggle="tab">Квартиры</a></li>
        <li><a href="#inf_structure" data-toggle="tab">Инфраструктура</a></li>
      </ul>

      <div class="tab-content">
        <div class="tab-pane active" id="rcs">
          <br>
          <div class="row">
            <div class="col-md-8">
              <div class="row">
                <div class="col-md-8">
                  <form name="deleteRCForm" method="POST">
                    <fieldset>
                     <legend>Жилые комплексы</legend>
                      <input type="submit" name="deleteRCButton" value="Удалить" class="btn btn-danger">
                      {foreach from=$rcsByArea item=_rcs key=area}
                        <fieldset>
                          <legend>{$area}</legend>
                          <table class="table table-bordered">
                            <tr>
                              <th>Название</th>
                              <th>Застройщик</th>
                              <th>Адрес</th>
                              <th>Статус</th>
                              <th>Выбрать</th>
                            </tr>
                            {foreach from=$_rcs item=rc}
                             <tr>
                               <td>{$rc->getName()}</td>
                               <td>{$rc->getBuilder()}</td>
                               <td>{$rc->getAddress()}</td>
                               <td>{$rc->getTextStatus()}</td>
                               <td style="display: flex; justify-content: center;"><input type="checkbox" name="select_rc[]" value="{$rc->getName()}"></td>
                             </tr>
                            {/foreach}
                          </table>
                        </fieldset>
                      {/foreach}
                    </fieldset>
                  </form>
                </div>
                <div class="col-md-4">
                  <br>
                  <div class="panel-group" id="tables">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#tables" href="#builders">Застройщики</a>
                        </h4>
                      </div>
                      <div id="builders" class="panel-collapse collapse">
                        <div class="panel-body">
                          <table class="table table-bordered">
                            <tr>
                              <th>Название</th>
                              <th>Выбрать</th>
                            </tr>
                            {foreach from=$builders item=builder}
                              <tr>
                                <td>{$builder->getName()}</td>
                                <td style="display: flex; justify-content: center;"><input type="checkbox" name="select_builder" value="{$builder->getName()}" required></td>
                              </tr>
                            {/foreach}
                          </table>
                        </div>
                      </div>
                    </div>
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#tables" href="#areas">Районы</a>
                        </h4>
                      </div>
                      <div id="areas" class="panel-collapse collapse">
                        <div class="panel-body">
                          <form name="deleteAreaForm" method="POST">
                            <input type="submit" name="deleteAreaButton" value="Удалить" class="btn btn-danger">
                            <hr>
                            <table class="table table-bordered">
                              <tr>
                                <th>Название</th>
                                <th>Выбрать</th>
                              </tr>
                              {foreach from=$areas item=area}
                                <tr>
                                  <td>{$area->getName()}</td>
                                  <td style="display: flex; justify-content: center;"><input type="checkbox" name="select_area[]" value="{$area->getName()}" required></td>
                                </tr>
                              {/foreach}
                            </table>
                          </form>
                        </div>
                      </div>
                    </div>
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#tables" href="#changeStatusRC">Изменить стаус ЖК</a>
                        </h4>
                      </div>
                      <div id="changeStatusRC" class="panel-collapse collapse">
                        <div class="panel-body">
                          <form name="changeStatusRCForm" method="POST">
                            <div class="form-group">
                              <label>Жилой комплекс</label>
                              <select name="rc_name" class="form-control" required>
                                {foreach from=$rcs item=rc}
                                  <option>{$rc->getName()}</option>
                                {/foreach}
                              </select>
                            </div>
                            <div class="form-group">
                              <label>Статус</label>
                              <select name="rc_status" class="form-control" required>
                                {foreach from=$statutses item=status}
                                  <option>{$status['description']}</option>
                                {/foreach}
                              </select>
                            </div>
                            <div class="form-group">
                              <input type="submit" name="changeStatusRCButton" class="btn btn-primary" value="Изменить">
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="row">
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-6">
                      <fieldset>
                        <legend>Добавить застройщика</legend>
                        <form name="addBuilderForm" method="POST">
                          <div class="form-group">
                            <label>Название</label>
                            <input type="text" name="builder" class="form-control" required>
                          </div>
                          <div class="form-group">
                            <input type="submit" name="addBuilderButton" class="btn btn-primary" value="Добавить">
                          </div>
                        </form>
                      </fieldset>
                    </div>
                    <div class="col-md-6">
                      <fieldset>
                        <legend>Добавить район</legend>
                        <form name="addAreaForm" method="POST">
                          <div class="form-group">
                            <label>Название</label>
                            <input type="text" name="area_name" class="form-control" required>
                          </div>
                          <div class="form-group">
                            <input type="submit" name="addAreaButton" class="btn btn-primary" value="Добавить">
                          </div>
                        </form>
                      </fieldset>                
                    </div>
                  </div>
                  <fieldset>
                    <legend>Добавить ЖК</legend>
                    <form name="addRCForm" method="POST">
                      <div class="form-group">
                        <label>Район</label>
                        <select name="rc_area_name" class="form-control" required>
                          {foreach from=$areas item=area}
                            <option>{$area->getName()}</option>
                          {/foreach}
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Название</label>
                        <input type="text" name="rc_name" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label>Адрес</label>
                        <input type="text" name="rc_address" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label>Застройщик</label>
                        <select name="rc_builder" class="form-control" required>
                          {foreach from=$builders item=builder}
                              <option value="{$builder->getName()}">{$builder->getName()}</option>
                          {/foreach}
                        </select>
                      </div>
                      <div class="form-group">
                        <input type="submit" name="addRCButton" class="btn btn-primary" value="Добавить">
                      </div>
                    </form>
                  </fieldset>
                  <fieldset>
                    <legend>Добавить дом к ЖК</legend>
                    <form name="addHomeToRCForm" method="POST">
                      <div class="form-group">
                        <label>Жилой комплекс</label>
                        <select name="rc_name" class="form-control" required>
                          {foreach from=$rcs item=rc}
                            <option>{$rc->getName()}</option>
                          {/foreach}
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Адрес</label>
                        <input type="text" name="home_address" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label>Кол-во этажей</label>
                        <input type="number" min="9" value="9" max="20" name="home_count_floors" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label>Кол-во подъездов</label>
                        <input type="number" min="3" value="3" max="20" name="home_count_porch" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <input type="submit" name="addHomeToRCButton" class="btn btn-primary" value="Добавить">
                      </div>
                    </form>
                  </fieldset>
                  <fieldset>
                    <legend>Добавить информацию об квартире</legend>
                    <form name="addFlatToHouseForm" method="POST">
                      <div class="form-group">
                        <label>Жилой комплекс</label>
                        <select name="rc_name_for_flat" class="form-control" required>
                          {foreach from=$rcs item=rc}
                            <option>{$rc->getName()}</option>
                          {/foreach}
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Дом</label>
                        <select name="home_address" class="form-control" required></select>
                      </div>
                      <div class="form-group">
                        <label>Подъезд</label>
                        <input type="number" name="flt_porch" min="1" value="1" max="20" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label>Этаж</label>
                        <input type="number" name="flt_floor" min="1" value="1" max="20" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label>Номер квартиры</label>
                        <input type="number" name="flt_number" min="1" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label>Кол-во комнат</label>
                        <input type="number" name="flt_count_rooms" min="1" value="1" max="5" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label>Площадь</label>
                        <input type="number" name="flt_square" min="7" value="7" max="200" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label>Балкон</label>
                        <table width="100%">
                          <tr>
                            <td>Да</td>
                            <td><input type="radio" name="flt_balcony" value="1" required></td>
                            <td>Нет</td>
                            <td><input type="radio" name="flt_balcony" value="0" required></td>
                          </tr>
                        </table>
                      </div>
                      <div class="form-group">
                        <label>Стоимость</label>
                        <input type="number" name="flt_price" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <input type="submit" name="addFlatToHouseButton" class="btn btn-primary" value="Добавить">
                      </div>
                    </form>
                  </fieldset>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane" id="houses">
          <br>
          <div class="row">
            <div class="col-md-12">
              <label>Жилой комплекс</label>
              <select name="changeRCForHome" class="form-control">
                {foreach from=$rcs item=rc}
                  <option>{$rc->getName()}</option>
                {/foreach}
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <br>
              <form name="deleteHouseForm" method="POST">
                <input type="submit" name="deleteHouseButton" value="Удалить" class="btn btn-danger">
                <hr>
                <table id="housesByRC" class="table table-border"></table>
              </form>
            </div>
          </div>
        </div>
        <div class="tab-pane" id="flats">
          <br>
          <div class="row">
            <div class="col-md-6">
              <label>Жилой комплекс</label>
              <select name="changeRC" class="form-control">
                {foreach from=$rcs item=rc}
                  <option>{$rc->getName()}</option>
                {/foreach}
              </select>
            </div>
            <div class="col-md-6">
              <label>Дом</label>
              <select name="changeHome" class="form-control">
                <option></option>
              </select>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-md-12">
              <form name="deleteFlatForm" method="POST">
                <input type="submit" name="changeFlatButton" value="Изменить" class="btn btn-warning">
                <input type="submit" name="deleteFlatButton" value="Удалить" class="btn btn-danger">
                <table id="flatsByHome" class="table table-border"></table>
              </form>
            </div>
          </div>
        </div>
        <div class="tab-pane" id="inf_structure">
          <div class="row">
            <div class="col-md-8">
              <br>
              <form name="deleteInfForm" method="POST">
              <input type="submit" name="deleteInfButton" value="Удалить" class="btn btn-danger">
              {foreach from=$infsByArea item=infs key=area}
                <fieldset>
                  <legend>{$area}</legend>
                  <table class="table table-bordered">
                    <tr>
                      <th>Адрес</th>
                      <th>Выбрать</th>
                    </tr>
                    {foreach from=$infs item=inf}
                     <tr>
                       <td>{$inf['address']}</td>
                       <td><input type="checkbox" name="select_inf[]" value="{$inf['id_inf']}"></td>
                     </tr>
                    {/foreach}
                  </table>
                </fieldset>
              {/foreach}
            </div>
            <div class="col-md-4">
              <fieldset>
                <legend>Добавить новую структуру</legend>
                <form name="addNewInfForm" method="POST">
                  <div class="form-group">
                    <label>Район</label>
                    <select name="area_name" class="form-control">
                      {foreach from=$areas item=area}
                        <option>{$area->getName()}</option>
                      {/foreach}
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Адрес</label>
                    <input type="text" name="inf_address" class="form-control">
                  </div>
                  <div class="form-group">
                    <input type="submit" name="addNewInfButton" class="btn btn-primary">
                  </div>
                </form>
              </fieldset>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <script type="text/javascript">
    
    $(document).ready(function(){
      
      if ($("[name='rc_name_for_flat']").val() != "") {
        var rc_name = $("[name='rc_name_for_flat']").val();
        
        $.ajax({
          url: "php/getHouses.php",
          type: "POST",
          data: "rc_name=" + rc_name,
          success: function(replay) {
            $("[name='home_address']").html("");
            $("[name='home_address']").html(replay);
          }
        });
      }
      
      if ($("[name='changeRC']").val() != "") {
        var rc_name = $("[name='changeRC']").val();
        
        $.ajax({
          url: "php/getHouses.php",
          type: "POST",
          data: "rc_name=" + rc_name,
          success: function(replay) {
            $("[name='changeHome']").html("");
            $("[name='changeHome']").html(replay);
          }
        });
      }
      
      if ($("[name='changeHome']").val() != "") {
        
        var rc_name = $("[name='changeRC']").val();
        var home_address = $("[name='changeHome']").val();
        
        $.ajax({
          url: "php/getFlats.php",
          type: "POST",
          data: "rc_name=" + rc_name + "&home_address=" + home_address,
          success: function(replay) {
            $("#flatsByHome").html(replay);
          }
        });
        
      }
      
      $("[name='rc_name_for_flat']").change(function(){
        var rc_name = this.value;
        
        $.ajax({
          url: "php/getHouses.php",
          type: "POST",
          data: "rc_name=" + rc_name,
          success: function(replay) {
            $("[name='home_address']").html("");
            $("[name='home_address']").html(replay);
          }
        });
        
      });
    
      $("[name='changeRC']").change(function(){
        var rc_name = this.value;
        
        $.ajax({
          url: "php/getHouses.php",
          type: "POST",
          data: "rc_name=" + rc_name,
          success: function(replay) {
            $("[name='changeHome']").html("");
            $("[name='changeHome']").html(replay);
          }
        });
        
      });
      
      $("[name='changeHome']").change(function(){
        var rc_name = $("[name='changeRC']").val();
        var home_address = this.value;
        
        $.ajax({
          url: "php/getFlats.php",
          type: "POST",
          data: "rc_name=" + rc_name + "&home_address=" + home_address,
          success: function(replay) {
            $("#flatsByHome").html(replay);
          }
        });
        
      });
      
      $("[name='changeRCForHome']").change(function(){
        var rc_name = $("[name='changeRCForHome']").val();
        
        $.ajax({
          url: "php/getHousesByRC.php",
          type: "POST",
          data: "rc_name=" + rc_name,
          success: function(replay) {
            $("#housesByRC").html(replay);
          }
        });
        
      });
    
    });
    
    </script>
	</body>
</html>
