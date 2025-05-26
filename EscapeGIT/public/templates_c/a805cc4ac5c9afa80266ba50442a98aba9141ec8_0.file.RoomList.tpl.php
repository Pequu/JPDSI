<?php
/* Smarty version 3.1.30, created on 2025-05-25 22:48:39
  from "G:\XAMPP\htdocs\Escape\app\views\RoomList.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_68338227c913f7_07040592',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a805cc4ac5c9afa80266ba50442a98aba9141ec8' => 
    array (
      0 => 'G:\\XAMPP\\htdocs\\Escape\\app\\views\\RoomList.tpl',
      1 => 1748205761,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
  ),
),false)) {
function content_68338227c913f7_07040592 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_176224217668338227c910c4_15170013', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'content'} */
class Block_176224217668338227c910c4_15170013 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="container">
<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
roomList#pokoje">
	<h2>Escape Roomy</h2><br>
	<h4>Opcje wyszukiwania</h4>
	<div class="row">
		<div class="col-4 col-12-mobile"><input type="text" placeholder="nazwa" name="sf_roomName" value="<?php echo $_smarty_tpl->tpl_vars['searchForm']->value->roomName;?>
" /></div>
		<div class="col-4 col-12-mobile"><button type="submit" >Filtruj</button></div>
	</div>
</form>
</div>	


<div class="container">
<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
personNew">+ Nowa osoba</a>
</div>	

<div class="container">
	<div class="row">
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rooms']->value, 'r');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['r']->value) {
?>
	<div class="col-4 col-12-mobile"><div class="room-disp"><span class="image br"><img src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->asset_path;?>
/images/<?php echo $_smarty_tpl->tpl_vars['r']->value["roomCover"];?>
.jpg" alt="logo" /></span><p><?php echo $_smarty_tpl->tpl_vars['r']->value["roomName"];?>
, <?php echo $_smarty_tpl->tpl_vars['r']->value["roomPrice"];?>
zł  <br><br><?php echo $_smarty_tpl->tpl_vars['r']->value["roomDescription"];?>
<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
personEdit/<?php echo $_smarty_tpl->tpl_vars['r']->value['idRoom'];?>
"><h4>Rezerwuj</a> | <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
personDelete/<?php echo $_smarty_tpl->tpl_vars['r']->value['idRoom'];?>
">Usuń</h4></a></p></div>
	</div>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

	</div>
</div>

<?php
}
}
/* {/block 'content'} */
}
