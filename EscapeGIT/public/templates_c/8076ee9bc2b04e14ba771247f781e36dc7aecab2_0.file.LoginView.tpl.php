<?php
/* Smarty version 3.1.30, created on 2025-06-02 14:50:01
  from "C:\Users\Mateusz\XAMPP\htdocs\Escape\app\views\LoginView.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_683d9df98b5422_95744269',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8076ee9bc2b04e14ba771247f781e36dc7aecab2' => 
    array (
      0 => 'C:\\Users\\Mateusz\\XAMPP\\htdocs\\Escape\\app\\views\\LoginView.tpl',
      1 => 1748512042,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
  ),
),false)) {
function content_683d9df98b5422_95744269 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_870409049683d9df98b3bb8_29212495', 'toptop');
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'toptop'} */
class Block_870409049683d9df98b3bb8_29212495 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="container">
	<br>
	<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
login" method="post">
		<h2>Logowanie do systemu</h2><br>
			<div class="row">
				<div class="col-6 col-12-mobile">
					<label for="id_login" class="t-center">login:</label>
					<input id="id_login" type="text" name="login" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->login;?>
"/>
				</div>
				<div class="col-6 col-12-mobile">
					<label for="id_pass" class="t-center">pass:</label>
					<input id="id_pass" type="password" name="pass" />
				</div>
				<div  class="col-12 col-12-mobile">
					<input type="submit" value="zaloguj"/>
				</div>

				<div class="col-12">
					<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isError()) {?>
						<ul>
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getMessages(), 'msg');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
?>
							<li><?php echo $_smarty_tpl->tpl_vars['msg']->value->text;?>
</li>
						<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

						</ul>
					<?php }?>
				</div>
			</div>
			<div class="col-12">
					<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
registerShow">Nie masz konta?</a>
				</div>
			<br>
	</form>	
</div>
<?php
}
}
/* {/block 'toptop'} */
}
