<?php
/* Smarty version 3.1.30, created on 2025-06-03 10:39:30
  from "C:\Users\Mateusz\XAMPP\htdocs\Escape\app\views\RegisterView.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_683eb4c204b500_73502255',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c0c885f22921b2af0a20dca0a48b709af40df0c4' => 
    array (
      0 => 'C:\\Users\\Mateusz\\XAMPP\\htdocs\\Escape\\app\\views\\RegisterView.tpl',
      1 => 1748513472,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
  ),
),false)) {
function content_683eb4c204b500_73502255 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_395878295683eb4c2048e38_24840228', 'toptop');
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'toptop'} */
class Block_395878295683eb4c2048e38_24840228 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="container">
	<br>
	<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
register" method="post">
		<h2>Rejestracja Konta</h2><br>
			<div class="row">
				<div class="col-3 col-12-mobile">
					<label for="id_name" class="t-center">Imię:</label>
					<input id="id_name" type="text" name="name" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->name;?>
"/>
				</div>
				<div class="col-3 col-12-mobile">
					<label for="id_surname" class="t-center">Nazwisko:</label>
					<input id="id_surname" type="text" name="surname" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->name;?>
"/>
				</div>
				<div class="col-3 col-12-mobile">
					<label for="id_email" class="t-center">Email:</label>
					<input id="id_email" type="email" name="email" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->email;?>
"/>
				</div>
				<div class="col-3 col-12-mobile">
					<label for="id_birth" class="t-center">Data Ur:</label>
					<input id="id_birth" type="date" name="birth" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->birth;?>
"/>
				</div>
				<div class="col-4 col-12-mobile">
					<label for="id_login" class="t-center">login:</label>
					<input id="id_login" type="text" name="login" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->login;?>
"/>
				</div>
				<div class="col-4 col-12-mobile">
					<label for="id_pass" class="t-center">Hasło:</label>
					<input id="id_pass" type="password" name="pass" />
				</div>
				<div class="col-4 col-12-mobile">
					<label for="id_pass" class="t-center">Powtórz Hasło:</label>
					<input id="id_pass2" type="password" name="pass2" />
				</div>
				<div  class="col-12 col-12-mobile">
					<input type="submit" value="Zarejestruj"/>
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
login">Masz konto? Zaloguj się</a>
				</div>
			<br>
			<br>
	</form>	
</div>
<?php
}
}
/* {/block 'toptop'} */
}
