<?php
/* Smarty version 3.1.29, created on 2017-06-27 15:40:45
  from "C:\Users\Dmitry\Desktop\OpenServer\domains\Quality-House-master\src\admin\templates\tpl\index.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5952524d5d5b86_53621324',
  'file_dependency' => 
  array (
    'af4e015aa820f20c9fc57e4397a760208a89012a' => 
    array (
      0 => 'C:\\Users\\Dmitry\\Desktop\\OpenServer\\domains\\Quality-House-master\\src\\admin\\templates\\tpl\\index.tpl',
      1 => 1498567238,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5952524d5d5b86_53621324 ($_smarty_tpl) {
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
            <a href="docs/Руководство для администратора.html" target="__blank">Руководство</a>
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
				  <?php if ($_smarty_tpl->tpl_vars['rcsByArea']->value != NULL) {?>
                    <fieldset>
                     <legend>Жилые комплексы</legend>
                      <input type="submit" name="deleteRCButton" value="Удалить" class="btn btn-danger">
                      <br>
                      <br>
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
"></td>
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
				  <?php } else { ?>
					<h1>ЖК не добавлены</h1>
				  <?php }?>
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
						<?php if ($_smarty_tpl->tpl_vars['builders']->value != NULL) {?>
                          <table class="table table-bordered">
                            <tr>
                              <th>Название</th>
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
                              </tr>
                            <?php
$_smarty_tpl->tpl_vars['builder'] = $__foreach_builder_2_saved_local_item;
}
if ($__foreach_builder_2_saved_item) {
$_smarty_tpl->tpl_vars['builder'] = $__foreach_builder_2_saved_item;
}
?>
                          </table>
						<?php } else { ?>
							<h3>Застройщики не добвлены</h3>
						<?php }?>
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
						<?php if ($_smarty_tpl->tpl_vars['areas']->value != NULL) {?>
                          <form name="deleteAreaForm" method="POST">
                            <input type="submit" name="deleteAreaButton" value="Удалить" class="btn btn-danger">
                            <hr>
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
                                  <td style="display: flex; justify-content: center;"><input type="checkbox" name="select_area[]" value="<?php echo $_smarty_tpl->tpl_vars['area']->value->getName();?>
"></td>
                                </tr>
                              <?php
$_smarty_tpl->tpl_vars['area'] = $__foreach_area_3_saved_local_item;
}
if ($__foreach_area_3_saved_item) {
$_smarty_tpl->tpl_vars['area'] = $__foreach_area_3_saved_item;
}
?>
                            </table>
                          </form>
						<?php } else { ?>
							<h3>Районы не добвлены</h3>
						<?php }?>
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
                        <select name="rc_name_for_flat" class="form-control" required>
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
                <?php
$_from = $_smarty_tpl->tpl_vars['rcs']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_rc_10_saved_item = isset($_smarty_tpl->tpl_vars['rc']) ? $_smarty_tpl->tpl_vars['rc'] : false;
$_smarty_tpl->tpl_vars['rc'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['rc']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['rc']->value) {
$_smarty_tpl->tpl_vars['rc']->_loop = true;
$__foreach_rc_10_saved_local_item = $_smarty_tpl->tpl_vars['rc'];
?>
                  <option><?php echo $_smarty_tpl->tpl_vars['rc']->value->getName();?>
</option>
                <?php
$_smarty_tpl->tpl_vars['rc'] = $__foreach_rc_10_saved_local_item;
}
if ($__foreach_rc_10_saved_item) {
$_smarty_tpl->tpl_vars['rc'] = $__foreach_rc_10_saved_item;
}
?>
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
                <?php
$_from = $_smarty_tpl->tpl_vars['rcs']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_rc_11_saved_item = isset($_smarty_tpl->tpl_vars['rc']) ? $_smarty_tpl->tpl_vars['rc'] : false;
$_smarty_tpl->tpl_vars['rc'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['rc']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['rc']->value) {
$_smarty_tpl->tpl_vars['rc']->_loop = true;
$__foreach_rc_11_saved_local_item = $_smarty_tpl->tpl_vars['rc'];
?>
                  <option><?php echo $_smarty_tpl->tpl_vars['rc']->value->getName();?>
</option>
                <?php
$_smarty_tpl->tpl_vars['rc'] = $__foreach_rc_11_saved_local_item;
}
if ($__foreach_rc_11_saved_item) {
$_smarty_tpl->tpl_vars['rc'] = $__foreach_rc_11_saved_item;
}
?>
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
                <hr>
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
              <?php
$_from = $_smarty_tpl->tpl_vars['infsByArea']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_infs_12_saved_item = isset($_smarty_tpl->tpl_vars['infs']) ? $_smarty_tpl->tpl_vars['infs'] : false;
$__foreach_infs_12_saved_key = isset($_smarty_tpl->tpl_vars['area']) ? $_smarty_tpl->tpl_vars['area'] : false;
$_smarty_tpl->tpl_vars['infs'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['area'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['infs']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['area']->value => $_smarty_tpl->tpl_vars['infs']->value) {
$_smarty_tpl->tpl_vars['infs']->_loop = true;
$__foreach_infs_12_saved_local_item = $_smarty_tpl->tpl_vars['infs'];
?>
                <fieldset>
                  <legend><?php echo $_smarty_tpl->tpl_vars['area']->value;?>
</legend>
                  <table class="table table-bordered">
                    <tr>
                      <th>Адрес</th>
                      <th>Выбрать</th>
                    </tr>
                    <?php
$_from = $_smarty_tpl->tpl_vars['infs']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_inf_13_saved_item = isset($_smarty_tpl->tpl_vars['inf']) ? $_smarty_tpl->tpl_vars['inf'] : false;
$_smarty_tpl->tpl_vars['inf'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['inf']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['inf']->value) {
$_smarty_tpl->tpl_vars['inf']->_loop = true;
$__foreach_inf_13_saved_local_item = $_smarty_tpl->tpl_vars['inf'];
?>
                     <tr>
                       <td><?php echo $_smarty_tpl->tpl_vars['inf']->value['address'];?>
</td>
                       <td><input type="checkbox" name="select_inf[]" value="<?php echo $_smarty_tpl->tpl_vars['inf']->value['id_inf'];?>
"></td>
                     </tr>
                    <?php
$_smarty_tpl->tpl_vars['inf'] = $__foreach_inf_13_saved_local_item;
}
if ($__foreach_inf_13_saved_item) {
$_smarty_tpl->tpl_vars['inf'] = $__foreach_inf_13_saved_item;
}
?>
                  </table>
                </fieldset>
              <?php
$_smarty_tpl->tpl_vars['infs'] = $__foreach_infs_12_saved_local_item;
}
if ($__foreach_infs_12_saved_item) {
$_smarty_tpl->tpl_vars['infs'] = $__foreach_infs_12_saved_item;
}
if ($__foreach_infs_12_saved_key) {
$_smarty_tpl->tpl_vars['area'] = $__foreach_infs_12_saved_key;
}
?>
            </div>
            <div class="col-md-4">
              <fieldset>
                <legend>Добавить новую структуру</legend>
                <form name="addNewInfForm" method="POST">
                  <div class="form-group">
                    <label>Район</label>
                    <select name="area_name" class="form-control">
                      <?php
$_from = $_smarty_tpl->tpl_vars['areas']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_area_14_saved_item = isset($_smarty_tpl->tpl_vars['area']) ? $_smarty_tpl->tpl_vars['area'] : false;
$_smarty_tpl->tpl_vars['area'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['area']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['area']->value) {
$_smarty_tpl->tpl_vars['area']->_loop = true;
$__foreach_area_14_saved_local_item = $_smarty_tpl->tpl_vars['area'];
?>
                        <option><?php echo $_smarty_tpl->tpl_vars['area']->value->getName();?>
</option>
                      <?php
$_smarty_tpl->tpl_vars['area'] = $__foreach_area_14_saved_local_item;
}
if ($__foreach_area_14_saved_item) {
$_smarty_tpl->tpl_vars['area'] = $__foreach_area_14_saved_item;
}
?>
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
    
    <?php echo '<script'; ?>
 type="text/javascript">
    
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
    
    <?php echo '</script'; ?>
>
	</body>
</html>
<?php }
}
