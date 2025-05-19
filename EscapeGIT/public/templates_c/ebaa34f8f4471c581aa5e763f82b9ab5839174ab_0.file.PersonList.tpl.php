<?php
/* Smarty version 3.1.30, created on 2025-05-19 19:28:45
  from "G:\XAMPP\htdocs\Escape\app\views\PersonList.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_682b6a4d1be938_07866324',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ebaa34f8f4471c581aa5e763f82b9ab5839174ab' => 
    array (
      0 => 'G:\\XAMPP\\htdocs\\Escape\\app\\views\\PersonList.tpl',
      1 => 1747675692,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
  ),
),false)) {
function content_682b6a4d1be938_07866324 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_895537602682b6a4d1be642_34408231', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'content'} */
class Block_895537602682b6a4d1be642_34408231 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
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
</div>	


<div class="container">
<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
personNew">+ Nowa osoba</a>
</div>	

<div class="container">
	
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['people']->value, 'p');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['p']->value) {
?>
	<div class="col-4 col-12-mobile"><?php echo $_smarty_tpl->tpl_vars['p']->value["name"];?>
<br><?php echo $_smarty_tpl->tpl_vars['p']->value["surname"];?>
<br><?php echo $_smarty_tpl->tpl_vars['p']->value["birthdate"];?>
<br>// <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
personEdit/<?php echo $_smarty_tpl->tpl_vars['p']->value['idperson'];?>
">Edytuj</a>// &nbsp;// <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
personDelete/<?php echo $_smarty_tpl->tpl_vars['p']->value['idperson'];?>
">Usuń</a> <br>
	</div>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

</div>

<?php
}
}
/* {/block 'content'} */
}
