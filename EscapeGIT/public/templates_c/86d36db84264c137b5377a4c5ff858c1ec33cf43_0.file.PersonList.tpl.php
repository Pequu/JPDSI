<?php
/* Smarty version 3.1.30, created on 2025-05-23 20:24:26
  from "C:\Users\Mateusz\XAMPP\htdocs\Escape\app\views\PersonList.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_6830bd5a055623_75393106',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '86d36db84264c137b5377a4c5ff858c1ec33cf43' => 
    array (
      0 => 'C:\\Users\\Mateusz\\XAMPP\\htdocs\\Escape\\app\\views\\PersonList.tpl',
      1 => 1748024663,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
  ),
),false)) {
function content_6830bd5a055623_75393106 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19719087386830bd5a054745_19110277', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'content'} */
class Block_19719087386830bd5a054745_19110277 extends Smarty_Internal_Block
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
	<div class="col-4 col-12-mobile"><p><?php echo $_smarty_tpl->tpl_vars['p']->value["accName"];?>
,<?php echo $_smarty_tpl->tpl_vars['p']->value["accSurname"];?>
,<?php echo $_smarty_tpl->tpl_vars['p']->value["accLogin"];?>
// <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
personEdit/<?php echo $_smarty_tpl->tpl_vars['p']->value['idAccount'];?>
">Edytuj</a>// &nbsp;// <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
personDelete/<?php echo $_smarty_tpl->tpl_vars['p']->value['idAccount'];?>
">Usuń</a> <br></p>
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
