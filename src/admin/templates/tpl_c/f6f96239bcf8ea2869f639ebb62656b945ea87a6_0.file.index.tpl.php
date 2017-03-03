<?php
/* Smarty version 3.1.29, created on 2017-03-03 22:24:19
  from "C:\OpenServer\domains\qh.mgkit\src\admin\templates\tpl\index.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_58b9c2e376ca05_70830431',
  'file_dependency' => 
  array (
    'f6f96239bcf8ea2869f639ebb62656b945ea87a6' => 
    array (
      0 => 'C:\\OpenServer\\domains\\qh.mgkit\\src\\admin\\templates\\tpl\\index.tpl',
      1 => 1488569058,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58b9c2e376ca05_70830431 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Панель администратора</title>
		<meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap.css">
    <?php echo '<script'; ?>
 type="text/javascript" src="js/jquery.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="js/bootstrap.js"><?php echo '</script'; ?>
>
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
            <a href="#">Видеоруководство</a>
            <a href="#">Выйти</a>
          </nav>
        </div>
      </div>
    </header>
    <hr>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8">
          <div class="row">
            <div class="col-md-8">
							<form name="deleteRCForm" method="POST">
								<fieldset>
								 <legend>Жилые комплексы</legend>
									<input type="submit" name="deleteRCButton" value="Удалить" class="btn btn-danger">
									<?php
$_from = $_smarty_tpl->tpl_vars['rcsByArea']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach__rcs_0_saved_item = isset($_smarty_tpl->tpl_vars['_rcs']) ? $_smarty_tpl->tpl_vars['_rcs'] : false;
$__foreach__rcs_0_saved_key = isset($_smarty_tpl->tpl_vars['area']) ? $_smarty_tpl->tpl_vars['area'] : false;
$_smarty_tpl->tpl_vars['_rcs'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['area'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['_rcs']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['area']->value => $_smarty_tpl->tpl_vars['_rcs']->value) {
$_smarty_tpl->tpl_vars['_rcs']->_loop = true;
$__foreach__rcs_0_saved_local_item = $_smarty_tpl->tpl_vars['_rcs'];
?>
										<fieldset>
											<legend><?php echo $_smarty_tpl->tpl_vars['area']->value;?>
</legend>
											<table class="table table-bordered">
												<tr>
													<th>Название</th>
													<th>Застройщик</th>
													<th>Адрес</th>
													<th>Статус</th>
													<th>Выбрать</th>
												</tr>
												<?php
$_from = $_smarty_tpl->tpl_vars['_rcs']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_rc_1_saved_item = isset($_smarty_tpl->tpl_vars['rc']) ? $_smarty_tpl->tpl_vars['rc'] : false;
$_smarty_tpl->tpl_vars['rc'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['rc']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['rc']->value) {
$_smarty_tpl->tpl_vars['rc']->_loop = true;
$__foreach_rc_1_saved_local_item = $_smarty_tpl->tpl_vars['rc'];
?>
												 <tr>
													 <td><?php echo $_smarty_tpl->tpl_vars['rc']->value->getName();?>
</td>
													 <td><?php echo $_smarty_tpl->tpl_vars['rc']->value->getBuilder();?>
</td>
													 <td><?php echo $_smarty_tpl->tpl_vars['rc']->value->getAddress();?>
</td>
													 <td><?php echo $_smarty_tpl->tpl_vars['rc']->value->getTextStatus();?>
</td>
													 <td style="display: flex; justify-content: center;"><input type="checkbox" name="select_rc[]" value="<?php echo $_smarty_tpl->tpl_vars['rc']->value->getName();?>
" required></td>
												 </tr>
												<?php
$_smarty_tpl->tpl_vars['rc'] = $__foreach_rc_1_saved_local_item;
}
if ($__foreach_rc_1_saved_item) {
$_smarty_tpl->tpl_vars['rc'] = $__foreach_rc_1_saved_item;
}
?>
											</table>
										</fieldset>
									<?php
$_smarty_tpl->tpl_vars['_rcs'] = $__foreach__rcs_0_saved_local_item;
}
if ($__foreach__rcs_0_saved_item) {
$_smarty_tpl->tpl_vars['_rcs'] = $__foreach__rcs_0_saved_item;
}
if ($__foreach__rcs_0_saved_key) {
$_smarty_tpl->tpl_vars['area'] = $__foreach__rcs_0_saved_key;
}
?>
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
                        <?php
$_from = $_smarty_tpl->tpl_vars['builders']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_builder_2_saved_item = isset($_smarty_tpl->tpl_vars['builder']) ? $_smarty_tpl->tpl_vars['builder'] : false;
$_smarty_tpl->tpl_vars['builder'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['builder']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['builder']->value) {
$_smarty_tpl->tpl_vars['builder']->_loop = true;
$__foreach_builder_2_saved_local_item = $_smarty_tpl->tpl_vars['builder'];
?>
                          <tr>
                            <td><?php echo $_smarty_tpl->tpl_vars['builder']->value->getName();?>
</td>
                            <td style="display: flex; justify-content: center;"><input type="checkbox" name="select_builder" value="<?php echo $_smarty_tpl->tpl_vars['builder']->value->getName();?>
" required></td>
                          </tr>
                        <?php
$_smarty_tpl->tpl_vars['builder'] = $__foreach_builder_2_saved_local_item;
}
if ($__foreach_builder_2_saved_item) {
$_smarty_tpl->tpl_vars['builder'] = $__foreach_builder_2_saved_item;
}
?>
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
                          <th>Выбрать</th>
                        </tr>
                        <?php
$_from = $_smarty_tpl->tpl_vars['areas']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_area_3_saved_item = isset($_smarty_tpl->tpl_vars['area']) ? $_smarty_tpl->tpl_vars['area'] : false;
$_smarty_tpl->tpl_vars['area'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['area']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['area']->value) {
$_smarty_tpl->tpl_vars['area']->_loop = true;
$__foreach_area_3_saved_local_item = $_smarty_tpl->tpl_vars['area'];
?>
                          <tr>
                            <td><?php echo $_smarty_tpl->tpl_vars['area']->value->getName();?>
</td>
                            <td style="display: flex; justify-content: center;"><input type="checkbox" name="select_area" value="<?php echo $_smarty_tpl->tpl_vars['area']->value->getName();?>
" required></td>
                          </tr>
                        <?php
$_smarty_tpl->tpl_vars['area'] = $__foreach_area_3_saved_local_item;
}
if ($__foreach_area_3_saved_item) {
$_smarty_tpl->tpl_vars['area'] = $__foreach_area_3_saved_item;
}
?>
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
                          <label>Жилой комплекс</label>
                          <select name="rc_name" class="form-control" required>
                            <?php
$_from = $_smarty_tpl->tpl_vars['rcs']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_rc_4_saved_item = isset($_smarty_tpl->tpl_vars['rc']) ? $_smarty_tpl->tpl_vars['rc'] : false;
$_smarty_tpl->tpl_vars['rc'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['rc']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['rc']->value) {
$_smarty_tpl->tpl_vars['rc']->_loop = true;
$__foreach_rc_4_saved_local_item = $_smarty_tpl->tpl_vars['rc'];
?>
                              <option><?php echo $_smarty_tpl->tpl_vars['rc']->value->getName();?>
</option>
                            <?php
$_smarty_tpl->tpl_vars['rc'] = $__foreach_rc_4_saved_local_item;
}
if ($__foreach_rc_4_saved_item) {
$_smarty_tpl->tpl_vars['rc'] = $__foreach_rc_4_saved_item;
}
?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Статус</label>
                          <select name="rc_status" class="form-control" required>
                            <?php
$_from = $_smarty_tpl->tpl_vars['statutses']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_status_5_saved_item = isset($_smarty_tpl->tpl_vars['status']) ? $_smarty_tpl->tpl_vars['status'] : false;
$_smarty_tpl->tpl_vars['status'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['status']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['status']->value) {
$_smarty_tpl->tpl_vars['status']->_loop = true;
$__foreach_status_5_saved_local_item = $_smarty_tpl->tpl_vars['status'];
?>
                              <option><?php echo $_smarty_tpl->tpl_vars['status']->value['description'];?>
</option>
                            <?php
$_smarty_tpl->tpl_vars['status'] = $__foreach_status_5_saved_local_item;
}
if ($__foreach_status_5_saved_item) {
$_smarty_tpl->tpl_vars['status'] = $__foreach_status_5_saved_item;
}
?>
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
                      <?php
$_from = $_smarty_tpl->tpl_vars['areas']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_area_6_saved_item = isset($_smarty_tpl->tpl_vars['area']) ? $_smarty_tpl->tpl_vars['area'] : false;
$_smarty_tpl->tpl_vars['area'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['area']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['area']->value) {
$_smarty_tpl->tpl_vars['area']->_loop = true;
$__foreach_area_6_saved_local_item = $_smarty_tpl->tpl_vars['area'];
?>
                        <option><?php echo $_smarty_tpl->tpl_vars['area']->value->getName();?>
</option>
                      <?php
$_smarty_tpl->tpl_vars['area'] = $__foreach_area_6_saved_local_item;
}
if ($__foreach_area_6_saved_item) {
$_smarty_tpl->tpl_vars['area'] = $__foreach_area_6_saved_item;
}
?>
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
                      <?php
$_from = $_smarty_tpl->tpl_vars['builders']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_builder_7_saved_item = isset($_smarty_tpl->tpl_vars['builder']) ? $_smarty_tpl->tpl_vars['builder'] : false;
$_smarty_tpl->tpl_vars['builder'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['builder']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['builder']->value) {
$_smarty_tpl->tpl_vars['builder']->_loop = true;
$__foreach_builder_7_saved_local_item = $_smarty_tpl->tpl_vars['builder'];
?>
                          <option value="<?php echo $_smarty_tpl->tpl_vars['builder']->value->getName();?>
"><?php echo $_smarty_tpl->tpl_vars['builder']->value->getName();?>
</option>
                      <?php
$_smarty_tpl->tpl_vars['builder'] = $__foreach_builder_7_saved_local_item;
}
if ($__foreach_builder_7_saved_item) {
$_smarty_tpl->tpl_vars['builder'] = $__foreach_builder_7_saved_item;
}
?>
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
                      <?php
$_from = $_smarty_tpl->tpl_vars['rcs']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_rc_8_saved_item = isset($_smarty_tpl->tpl_vars['rc']) ? $_smarty_tpl->tpl_vars['rc'] : false;
$_smarty_tpl->tpl_vars['rc'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['rc']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['rc']->value) {
$_smarty_tpl->tpl_vars['rc']->_loop = true;
$__foreach_rc_8_saved_local_item = $_smarty_tpl->tpl_vars['rc'];
?>
                        <option><?php echo $_smarty_tpl->tpl_vars['rc']->value->getName();?>
</option>
                      <?php
$_smarty_tpl->tpl_vars['rc'] = $__foreach_rc_8_saved_local_item;
}
if ($__foreach_rc_8_saved_item) {
$_smarty_tpl->tpl_vars['rc'] = $__foreach_rc_8_saved_item;
}
?>
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
                    <select name="rc_name" class="form-control" required>
                      <?php
$_from = $_smarty_tpl->tpl_vars['rcs']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_rc_9_saved_item = isset($_smarty_tpl->tpl_vars['rc']) ? $_smarty_tpl->tpl_vars['rc'] : false;
$_smarty_tpl->tpl_vars['rc'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['rc']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['rc']->value) {
$_smarty_tpl->tpl_vars['rc']->_loop = true;
$__foreach_rc_9_saved_local_item = $_smarty_tpl->tpl_vars['rc'];
?>
                        <option><?php echo $_smarty_tpl->tpl_vars['rc']->value->getName();?>
</option>
                      <?php
$_smarty_tpl->tpl_vars['rc'] = $__foreach_rc_9_saved_local_item;
}
if ($__foreach_rc_9_saved_item) {
$_smarty_tpl->tpl_vars['rc'] = $__foreach_rc_9_saved_item;
}
?>
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
    <hr>
    <footer>
      
    </footer>
    
    <?php echo '<script'; ?>
 type="text/javascript">
    
      $("[name='rc_name']").change(function(){
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
    
    <?php echo '</script'; ?>
>
    
	</body>
</html>
<?php }
}
