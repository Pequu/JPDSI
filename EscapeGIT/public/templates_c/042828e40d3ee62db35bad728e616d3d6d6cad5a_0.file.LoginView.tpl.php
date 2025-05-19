<?php
/* Smarty version 3.1.30, created on 2025-05-19 20:52:52
  from "G:\XAMPP\htdocs\Escape\app\views\LoginView.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_682b7e047a5b61_25854909',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '042828e40d3ee62db35bad728e616d3d6d6cad5a' => 
    array (
      0 => 'G:\\XAMPP\\htdocs\\Escape\\app\\views\\LoginView.tpl',
      1 => 1747680771,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
  ),
),false)) {
function content_682b7e047a5b61_25854909 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1055677534682b7e047a43e1_66662195', 'logging');
?>



<div class="container">
<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
personList">
	<h3>Opcje wyszukiwania</h3>
	<div class="row">
		<div class="col-4 col-12-mobile"><input type="text" placeholder="nazwa" name="sf_surname" value="<?php echo $_smarty_tpl->tpl_vars['searchForm']->value->surname;?>
" /></div>
		<div class="col-4 col-12-mobile"><button type="submit" >Filtruj</button></div>
	</div>
</form>
</div>	<?php $_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'logging'} */
class Block_1055677534682b7e047a43e1_66662195 extends Smarty_Internal_Block
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
			</div>
			<br>
	</form>	
</div>
<?php
}
}
/* {/block 'logging'} */
}
