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
        
    </header>
    
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8">
          <div class="row">
            <div class="col-md-8">
            <fieldset>
               <legend>Жилые комплексы</legend>
                {foreach from=$rcsByArea item=_rcs key=area}
                  <fieldset>
                    <legend>{$area}</legend>
                    <table class="table table-bordered">
                      <tr>
                        <th>Название</th>
                        <th>Застройщик</th>
                        <th>Адрес</th>
                        <th>Статус</th>
                      </tr>
                      {foreach from=$_rcs item=rc}
                       <tr>
                         <td>{$rc->getName()}</td>
                         <td>{$rc->getBuilder()}</td>
                         <td>{$rc->getAddress()}</td>
                         <td>{$rc->getTextStatus()}</td>
                       </tr>
                      {/foreach}
                    </table>
                  </fieldset>
                {/foreach}
             </fieldset>
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
                        </tr>
                        {foreach from=$builders item=builder}
                          <tr>
                            <td>{$builder->getName()}</td>
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
                      <table class="table table-bordered">
                        <tr>
                          <th>Название</th>
                        </tr>
                        {foreach from=$areas item=area}
                          <tr>
                            <td>{$area->getName()}</td>
                          </tr>
                        {/foreach}
                      </table>
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
                          <label>ЖК</label>
                          <select name="rc_name" class="form-control">
                            {foreach from=$rcs item=rc}
                              <option>{$rc->getName()}</option>
                            {/foreach}
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Статус</label>
                          <select name="rc_status" class="form-control">
                            {foreach from=$statutses item=status}
                              <option>{$status['description']}</option>
                            {/foreach}
                          </select>
                        </div>
                        <div class="form-group">
                          <input type="submit" name="changeStatusRCButton" class="btn btn-primary">
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
              <fieldset>
                <legend>Добавить застройщика</legend>
                <form name="addBuilderForm" method="POST">
                  <div class="form-group">
                    <label>Название</label>
                    <input type="text" name="builder" class="form-control">
                  </div>
                  <div class="form-group">
                    <input type="submit" name="addBuilderButton" class="btn btn-primary">
                  </div>
                </form>
              </fieldset>
              <fieldset>
                <legend>Добавить район</legend>
                <form name="addAreaForm" method="POST">
                  <div class="form-group">
                    <label>Название</label>
                    <input type="text" name="area_name" class="form-control">
                  </div>
                  <div class="form-group">
                    <input type="submit" name="addAreaButton" class="btn btn-primary">
                  </div>
                </form>
              </fieldset>
              <fieldset>
                <legend>Добавить ЖК</legend>
                <form name="addRCForm" method="POST">
                  <div class="form-group">
                    <label>Район</label>
                    <select name="rc_area_name" class="form-control">                      
                      {foreach from=$areas item=area}
                        <option>{$area->getName()}</option>
                      {/foreach}
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Название</label>
                    <input type="text" name="rc_name" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Адрес</label>
                    <input type="text" name="rc_address" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Застройщик</label>
                    <select name="rc_builder" class="form-control">
                      {foreach from=$builders item=builder}
                          <option value="{$builder->getName()}">{$builder->getName()}</option>
                      {/foreach}
                    </select>
                  </div>
                  <div class="form-group">
                    <input type="submit" name="addRCButton" class="btn btn-primary">
                  </div>
                </form>
              </fieldset>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <footer>
      
    </footer>
	</body>
</html>
