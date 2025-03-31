<?php
/* Smarty version 5.4.2, created on 2025-03-31 20:21:52
  from 'file:G:\XAMPP\htdocs\Studia\ap04/app/calc.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.2',
  'unifunc' => 'content_67eadd402743d0_46676366',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bd4f247483a21e2b4f350a5c1ca7a7eef0127e52' => 
    array (
      0 => 'G:\\XAMPP\\htdocs\\Studia\\ap04/app/calc.html',
      1 => 1743444656,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_67eadd402743d0_46676366 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'G:\\XAMPP\\htdocs\\Studia\\ap04\\app';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_188750625467eadd402663f3_81282623', 'footer');
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_57592993067eadd40268a11_98313416', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "../templates/main.html", $_smarty_current_dir);
}
/* {block 'footer'} */
class Block_188750625467eadd402663f3_81282623 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'G:\\XAMPP\\htdocs\\Studia\\ap04\\app';
?>
przykładowa tresć stopki wpisana do szablonu głównego z szablonu kalkulatora<?php
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_57592993067eadd40268a11_98313416 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'G:\\XAMPP\\htdocs\\Studia\\ap04\\app';
?>


<header>
	<h2>Kalkulator Kredytowy</h2>
</header>

<form action="<?php echo $_smarty_tpl->getValue('app_url');?>
/app/calc.php#kalkulator" method="post" >
	<div class="row">
		<div class="col-4 col-12-mobile">Kwota<br><input type="text" name="kwota" placeholder="10000 PLN" value="<?php echo $_smarty_tpl->getValue('form')['kwota'];?>
"></div>
		<div class="col-4 col-12-mobile">Lata<br><input type="text" name="lata" placeholder="5 lat" value="<?php echo $_smarty_tpl->getValue('form')['lata'];?>
"></div>
		<div class="col-4 col-12-mobile">Oprocentowanie<input type="text" name="proc" placeholder="5 = 5%" value="<?php echo $_smarty_tpl->getValue('form')['proc'];?>
"></div>
		<div class="col-12">
			<input type="submit" value="Oblicz" />
		</div>
	</div>
</form>



<div>

<?php if ((null !== ($_smarty_tpl->getValue('messages') ?? null))) {?>
	<?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('messages')) > 0) {?> 
		<h4>Wystąpiły błędy: </h4>
		<ol class="err">
		<?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('messages'), 'msg');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('msg')->value) {
$foreach0DoElse = false;
?>
		<li><?php echo $_smarty_tpl->getValue('msg');?>
</li>
		<?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
		</ol>
	<?php }
}?>

<?php if ((null !== ($_smarty_tpl->getValue('infos') ?? null))) {?>
	<?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('infos')) > 0) {?> 
		<h4>Informacje: </h4>
		<ol class="inf">
		<?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('infos'), 'msg');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('msg')->value) {
$foreach1DoElse = false;
?>
		<li><?php echo $_smarty_tpl->getValue('msg');?>
</li>
		<?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
		</ol>
	<?php }
}?>

<?php if ((null !== ($_smarty_tpl->getValue('result') ?? null))) {?>
	<h4>Miesięczna rata:</h4>
	<p class="res">
	<?php echo $_smarty_tpl->getValue('result');?>
 PLN
	</p>
<?php }?>

</div>

<?php
}
}
/* {/block 'content'} */
}
