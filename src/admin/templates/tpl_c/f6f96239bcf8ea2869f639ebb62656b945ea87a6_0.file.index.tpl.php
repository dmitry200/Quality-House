<?php
/* Smarty version 3.1.29, created on 2017-02-28 18:16:30
  from "C:\OpenServer\domains\qh.mgkit\src\admin\templates\tpl\index.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_58b5944ed73b02_80573520',
  'file_dependency' => 
  array (
    'f6f96239bcf8ea2869f639ebb62656b945ea87a6' => 
    array (
      0 => 'C:\\OpenServer\\domains\\qh.mgkit\\src\\admin\\templates\\tpl\\index.tpl',
      1 => 1488294990,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58b5944ed73b02_80573520 ($_smarty_tpl) {
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
        
    </header>
    
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8">
          <div class="row">
            <div class="col-md-8">
             <fieldset>
               <legend>Жилые комплексы</legend>
                <table class="table table-bordered">
                 <tr>
                   <th>Район</th>
                   <th>Название</th>
                   <th>Застройщик</th>
                   <th>Адрес</th>
                   <th>Статус</th>
                 </tr>
                  <?php
$_from = $_smarty_tpl->tpl_vars['rcs']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_rc_0_saved_item = isset($_smarty_tpl->tpl_vars['rc']) ? $_smarty_tpl->tpl_vars['rc'] : false;
$_smarty_tpl->tpl_vars['rc'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['rc']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['rc']->value) {
$_smarty_tpl->tpl_vars['rc']->_loop = true;
$__foreach_rc_0_saved_local_item = $_smarty_tpl->tpl_vars['rc'];
?>
                    <tr>
                      <td><?php echo $_smarty_tpl->tpl_vars['rc']->value->getAreaName();?>
</td>
                      <td><?php echo $_smarty_tpl->tpl_vars['rc']->value->getName();?>
</td>
                      <td><?php echo $_smarty_tpl->tpl_vars['rc']->value->getBuilder();?>
</td>
                      <td><?php echo $_smarty_tpl->tpl_vars['rc']->value->getAddress();?>
</td>
                      <td><?php echo $_smarty_tpl->tpl_vars['rc']->value->getTextStatus();?>
</td>
                    </tr>
                  <?php
$_smarty_tpl->tpl_vars['rc'] = $__foreach_rc_0_saved_local_item;
}
if ($__foreach_rc_0_saved_item) {
$_smarty_tpl->tpl_vars['rc'] = $__foreach_rc_0_saved_item;
}
?>
               </table>
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
                        <?php
$_from = $_smarty_tpl->tpl_vars['builders']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_builder_1_saved_item = isset($_smarty_tpl->tpl_vars['builder']) ? $_smarty_tpl->tpl_vars['builder'] : false;
$_smarty_tpl->tpl_vars['builder'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['builder']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['builder']->value) {
$_smarty_tpl->tpl_vars['builder']->_loop = true;
$__foreach_builder_1_saved_local_item = $_smarty_tpl->tpl_vars['builder'];
?>
                          <tr>
                            <td><?php echo $_smarty_tpl->tpl_vars['builder']->value->getName();?>
</td>
                          </tr>
                        <?php
$_smarty_tpl->tpl_vars['builder'] = $__foreach_builder_1_saved_local_item;
}
if ($__foreach_builder_1_saved_item) {
$_smarty_tpl->tpl_vars['builder'] = $__foreach_builder_1_saved_item;
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
                        </tr>
                        <?php
$_from = $_smarty_tpl->tpl_vars['areas']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_area_2_saved_item = isset($_smarty_tpl->tpl_vars['area']) ? $_smarty_tpl->tpl_vars['area'] : false;
$_smarty_tpl->tpl_vars['area'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['area']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['area']->value) {
$_smarty_tpl->tpl_vars['area']->_loop = true;
$__foreach_area_2_saved_local_item = $_smarty_tpl->tpl_vars['area'];
?>
                          <tr>
                            <td><?php echo $_smarty_tpl->tpl_vars['area']->value->getName();?>
</td>
                          </tr>
                        <?php
$_smarty_tpl->tpl_vars['area'] = $__foreach_area_2_saved_local_item;
}
if ($__foreach_area_2_saved_item) {
$_smarty_tpl->tpl_vars['area'] = $__foreach_area_2_saved_item;
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
                          <label>ЖК</label>
                          <select name="rc_name" class="form-control">
                            <?php
$_from = $_smarty_tpl->tpl_vars['rcs']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_rc_3_saved_item = isset($_smarty_tpl->tpl_vars['rc']) ? $_smarty_tpl->tpl_vars['rc'] : false;
$_smarty_tpl->tpl_vars['rc'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['rc']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['rc']->value) {
$_smarty_tpl->tpl_vars['rc']->_loop = true;
$__foreach_rc_3_saved_local_item = $_smarty_tpl->tpl_vars['rc'];
?>
                              <option><?php echo $_smarty_tpl->tpl_vars['rc']->value->getName();?>
</option>
                            <?php
$_smarty_tpl->tpl_vars['rc'] = $__foreach_rc_3_saved_local_item;
}
if ($__foreach_rc_3_saved_item) {
$_smarty_tpl->tpl_vars['rc'] = $__foreach_rc_3_saved_item;
}
?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Статус</label>
                          <select name="rc_status" class="form-control">
                            <?php
$_from = $_smarty_tpl->tpl_vars['statutses']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_status_4_saved_item = isset($_smarty_tpl->tpl_vars['status']) ? $_smarty_tpl->tpl_vars['status'] : false;
$_smarty_tpl->tpl_vars['status'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['status']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['status']->value) {
$_smarty_tpl->tpl_vars['status']->_loop = true;
$__foreach_status_4_saved_local_item = $_smarty_tpl->tpl_vars['status'];
?>
                              <option><?php echo $_smarty_tpl->tpl_vars['status']->value['description'];?>
</option>
                            <?php
$_smarty_tpl->tpl_vars['status'] = $__foreach_status_4_saved_local_item;
}
if ($__foreach_status_4_saved_item) {
$_smarty_tpl->tpl_vars['status'] = $__foreach_status_4_saved_item;
}
?>
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
                      <?php
$_from = $_smarty_tpl->tpl_vars['areas']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_area_5_saved_item = isset($_smarty_tpl->tpl_vars['area']) ? $_smarty_tpl->tpl_vars['area'] : false;
$_smarty_tpl->tpl_vars['area'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['area']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['area']->value) {
$_smarty_tpl->tpl_vars['area']->_loop = true;
$__foreach_area_5_saved_local_item = $_smarty_tpl->tpl_vars['area'];
?>
                        <option><?php echo $_smarty_tpl->tpl_vars['area']->value->getName();?>
</option>
                      <?php
$_smarty_tpl->tpl_vars['area'] = $__foreach_area_5_saved_local_item;
}
if ($__foreach_area_5_saved_item) {
$_smarty_tpl->tpl_vars['area'] = $__foreach_area_5_saved_item;
}
?>
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
                      <?php
$_from = $_smarty_tpl->tpl_vars['builders']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_builder_6_saved_item = isset($_smarty_tpl->tpl_vars['builder']) ? $_smarty_tpl->tpl_vars['builder'] : false;
$_smarty_tpl->tpl_vars['builder'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['builder']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['builder']->value) {
$_smarty_tpl->tpl_vars['builder']->_loop = true;
$__foreach_builder_6_saved_local_item = $_smarty_tpl->tpl_vars['builder'];
?>
                          <option value="<?php echo $_smarty_tpl->tpl_vars['builder']->value->getName();?>
"><?php echo $_smarty_tpl->tpl_vars['builder']->value->getName();?>
</option>
                      <?php
$_smarty_tpl->tpl_vars['builder'] = $__foreach_builder_6_saved_local_item;
}
if ($__foreach_builder_6_saved_item) {
$_smarty_tpl->tpl_vars['builder'] = $__foreach_builder_6_saved_item;
}
?>
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
<?php }
}
