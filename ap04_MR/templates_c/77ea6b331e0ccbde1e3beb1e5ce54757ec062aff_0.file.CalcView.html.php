<?php
/* Smarty version 3.1.30, created on 2025-03-31 21:31:51
  from "G:\XAMPP\htdocs\Studia\ap04_MR\app\CalcView.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_67eaeda79637b6_27712553',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '77ea6b331e0ccbde1e3beb1e5ce54757ec062aff' => 
    array (
      0 => 'G:\\XAMPP\\htdocs\\Studia\\ap04_MR\\app\\CalcView.html',
      1 => 1743449510,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../templates/main.html' => 1,
  ),
),false)) {
function content_67eaeda79637b6_27712553 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_140978187667eaeda79595f5_95020757', 'footer');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_152534460567eaeda7963519_88903055', 'content');
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:../templates/main.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'footer'} */
class Block_140978187667eaeda79595f5_95020757 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
przykładowa tresć stopki wpisana do szablonu głównego z szablonu kalkulatora<?php
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_152534460567eaeda7963519_88903055 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<header>
	<h2>Kalkulator Kredytowy</h2>
</header>

<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/app/calc.php#kalkulator" method="post" >
	<div class="row">
		<div class="col-4 col-12-mobile">Kwota<br><input type="text" name="kwota" placeholder="10000 PLN" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->kwota;?>
"></div>
		<div class="col-4 col-12-mobile">Lata<br><input type="text" name="lata" placeholder="5 lat" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->lata;?>
"></div>
		<div class="col-4 col-12-mobile">Oprocentowanie<input type="text" name="proc" placeholder="5 = 5%" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->proc;?>
"></div>
		<div class="col-12">
			<input type="submit" value="Oblicz" />
		</div>
	</div>
</form>



<div class="messages">

	
	<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isError()) {?>
		<h4>Wystąpiły błędy: </h4>
		<ol class="err">
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getErrors(), 'err');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['err']->value) {
?>
		<li><?php echo $_smarty_tpl->tpl_vars['err']->value;?>
</li>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

		</ol>
	<?php }?>
	
	
	<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isInfo()) {?>
		<h4>Informacje: </h4>
		<ol class="inf">
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getInfos(), 'inf');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['inf']->value) {
?>
		<li><?php echo $_smarty_tpl->tpl_vars['inf']->value;?>
</li>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

		</ol>
	<?php }?>
	
	<?php if (isset($_smarty_tpl->tpl_vars['res']->value->result)) {?>
		<h4>Wynik</h4>
		<p class="res">
		<?php echo $_smarty_tpl->tpl_vars['res']->value->result;?>

		</p>
	<?php }?>
	
	</div>
	
	<?php
}
}
/* {/block 'content'} */
}
